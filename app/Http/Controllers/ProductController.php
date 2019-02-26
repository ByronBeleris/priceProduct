<?php
/**
 * Created by PhpStorm.
 * User: Byron Beleris
 * Date: 2019-02-26
 * Time: 03:15
 */

namespace App\Http\Controllers;

use App\Models\Contracts\IUnitOfWork;
use App\Models\Objects\Entities\Price;
use App\Models\Objects\ViewModels\AjaxMessageViewModel;
use App\Models\Objects\ViewModels\AjaxResponseViewModel;
use App\Models\Objects\ViewModels\AjaxStatus;
use App\Models\Objects\ViewModels\ProductViewModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var IUnitOfWork
     */
    private $unitOfWork;


    /**
     * PriceController constructor.
     *
     * @param IUnitOfWork $uow
     */
    public function __construct(IUnitOfWork $uow)
    {
        $this->unitOfWork = $uow;
    }

    /**
     * Returns the products view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetDisplayProducts()
    {
        return view('Products/product-display');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function PostJsonProducts(Request $request)
    {
        $file = file_get_contents(storage_path('live_prices.json'));
        $prices = json_decode($file, true);
        $products = $request->get('products');
        $accountId = $request->get('accountId');
        $dbPrice = $this->unitOfWork->PriceRepository()->GetMinPriceByProductsAndAccount($products, $accountId);
        $responseViewModel = new AjaxResponseViewModel();
        if( !is_null($dbPrice) )
        {
            $filePrice = $this->getMinOfPricesFile($prices, 'price', $dbPrice->GetProduct()->GetSku());
            $model = new ProductViewModel();
            $model->Map($dbPrice->GetProduct(), $dbPrice->GetAccount());
            $model->Price = $this->isInDatabase($dbPrice, $filePrice) ? $dbPrice->GetProduct()->GetPrice() : $filePrice['price'];
            $model->InDatabase = $this->isInDatabase($dbPrice, $filePrice) ? true : false;
            $responseViewModel->Status = AjaxStatus::SEVERITY_SUCCESS;
            $responseViewModel->Model = $model;
        }
        else
        {
            $responseViewModel->Status = AjaxStatus::SEVERITY_ERROR;
            $responseViewModel->AddMessage(new AjaxMessageViewModel( 'Price was not found. Please try another product code. (eg. PGCIMN)', AjaxStatus::SEVERITY_ERROR ) );
        }

        return response()->json(  $responseViewModel  );

    }

    /**
     * Gets min value of array of arrays by key and sku
     *
     * @param array $prices
     * @param string $key
     * @param string $sku
     * @return mixed
     */
    private function getMinOfPricesFile($prices, $key, $sku)
    {

        $newArray = array_filter($prices, function ($price) use ($sku) {
            return ($price['sku'] == $sku);
        });
        if( count($prices) > 0 )
        {

            usort($newArray, function($a, $b) {
                return $a['price'] - $b['price'];
            });
            return $newArray[0];
        }
        return [];
    }

    /**
     * Checks if price in database is lower than than price in file.
     *
     * @param Price $price
     * @param array $array
     * @return boolean
     */
    private function isInDatabase( Price $price, array $array)
    {
        if(count($array)>0 && $price->GetProduct()->GetPrice() < $array['price'])
        {
            return false;
        }
        return true;
    }


}