<?php namespace App\Http\Controllers;

/**
 * Description of ProductController
 *
 * @author Byron Beleris
 */

use App\Models\Contracts\IUnitOfWork;
use App\Models\Logic\ProductLogic;
use App\Models\Objects\ViewModels\AjaxMessageViewModel;
use App\Models\Objects\ViewModels\AjaxResponseViewModel;
use App\Models\Objects\ViewModels\AjaxStatus;

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
     * Gets all products from given ids and returns json
     *
     * @param ProductLogic $productLogic
     * @return \Illuminate\Http\JsonResponse
     */
    public function PostJsonProducts(ProductLogic $productLogic)
    {
        $responseViewModel = new AjaxResponseViewModel();
        $responseViewModel->Model = $productLogic->BuildProducts();
        if( !empty($responseViewModel->Model) )
        {
            $responseViewModel->Status = AjaxStatus::SEVERITY_SUCCESS;
        }
        else
        {
            $responseViewModel->Status = AjaxStatus::SEVERITY_ERROR;
            $responseViewModel->AddMessage(new AjaxMessageViewModel( 'Price was not found. Please try another product code. (eg. PGCIMN)', AjaxStatus::SEVERITY_ERROR ) );
        }
        return response()->json(  $responseViewModel  );
    }


}