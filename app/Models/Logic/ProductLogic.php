<?php namespace App\Models\Logic;


use App\Models\Contracts\IUnitOfWork;
use App\Models\Objects\Entities\Price;
use App\Models\Objects\ViewModels\ProductViewModel;
use Illuminate\Http\Request;

/**
 * Description of Product Logic
 *
 * @author Byron Beleris
 */
class ProductLogic
{

    /**
     * @var IUnitOfWork
     */
    private $unitOfWork;

    /**
     * @var Request
     */
    private $request;

    /**
     * The live prices array
     *
     * @var array
     */
    private $livePrices;

    /**
     * The array of products to return to view
     *
     * @var array
     */
    private $productsArray = [];

    /**
     * Constructor
     *
     * @param IUnitOfWork $uow
     */
    public function __construct(IUnitOfWork $uow, Request $request)
    {
        $this->unitOfWork = $uow;
        $this->request = $request;
        $file = file_get_contents(storage_path('live_prices.json'));
        $this->livePrices = json_decode($file, true);
    }


    /**
     * Builds products for view
     *
     * @return array
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function BuildProducts()
    {
        $accountNumber = $this->request->get('accountNumber');
        foreach ($this->request->get('products') as $productSku) {
            $product = $this->unitOfWork->ProductRepository()->GetBySku($productSku);
            if (is_null($product)) {
                continue;
            }
            $liveMinPrice = $this->CheckAndReturnMinLivePrice($productSku, $accountNumber);
            $dbMinPrice = $this->unitOfWork->PriceRepository()->GetMinPriceByProductAndAccount($productSku, $accountNumber);
            $model = new ProductViewModel();
            $model->Map($product, $liveMinPrice, $dbMinPrice);
            $this->SetAccountFromValues($model, $accountNumber, $liveMinPrice, $dbMinPrice);
            $this->productsArray[] = $model;
        }
        return $this->productsArray;
    }

    /**
     * Checks if given account is null and returns the array element that have min price, the given product sku
     * and, if it in not null, the given account number
     *
     * @param string $productSku
     * @param string|null $accountNumber
     * @return array|mixed
     */
    private function CheckAndReturnMinLivePrice($productSku, $accountNumber)
    {
        switch ($accountNumber) {
            case null:
                $result = array_filter($this->livePrices, function ($price) use ($productSku) {
                    return ($price['sku'] == $productSku );
                });
                break;
            default:
                $result = array_filter($this->livePrices, function ($price) use ($productSku, $accountNumber) {
                    return ($price['sku'] == $productSku && isset($price['account']) && $price['account'] == $accountNumber);
                });
                break;
        }
        if (!empty($result)) {
            usort($result, function ($a, $b) {
                return $a['price'] - $b['price'];
            });
            return $result[0];
        } else {
            return null;
        }
    }

    /**
     * @param mixed $accountNumber
     * @param mixed $liveMinPrice
     * @param Price|null $dbMinPrice
     */
    private function SetAccountFromValues( ProductViewModel $model, $accountNumber, $liveMinPrice, $dbMinPrice)
    {
        $account = false;
        if( $model->InLive && isset($liveMinPrice['account']) )
        {
            $account = $this->unitOfWork->AccountRepository()->GetByRef($liveMinPrice['account']);
        }
        elseif ($model->InDatabase && !is_null($dbMinPrice->GetAccount()))
        {
            $account = $dbMinPrice->GetAccount();
        }
        if( $account )
        {
            $model->AccountName = $account->GetName();
            $model->AccountNumber = $account->GetExternalReference();
        }

    }

}