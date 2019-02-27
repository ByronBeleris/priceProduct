<?php namespace App\Models\Objects\ViewModels;

use App\Models\Objects\Entities\Account;
use App\Models\Objects\Entities\Price;
use App\Models\Objects\Entities\Product;

/**
 * ProductViewModel
 * @package Application
 * @author Byron Beleris
 */
class ProductViewModel
{
    public $Id;
    public $Sku;
    public $AccountName = null;
    public $AccountNumber = null;
    public $Name;
    public $Description;
    public $Price;
    public $InDatabase = false;
    public $InLive = false;

    /**
     * ProductViewModel constructor.
     */
    public function __construct()
    {
    }

    /**
     * Map ProductViewModel from a product and an account
     *
     * @param Product $product
     * @param $liveMinPrice
     * @param Price|null $dbMinPrice
     * @return void
     */
    public function Map(Product $product, $liveMinPrice, $dbMinPrice)
    {
        $this->Id = $product->GetId();
        $this->Sku = $product->GetSku();
        $this->Name = $product->GetName();
        $this->Description = $product->GetDescription();
        $this->SetPriceAndInDatabaseValue($product, $liveMinPrice, $dbMinPrice);
    }


    /**
     * Sets the price and if the value is in database or in live
     *
     * @param Product $product
     * @param mixed $liveMinPrice
     * @param Price|null $dbMinPrice
     */
    private function SetPriceAndInDatabaseValue(Product $product, $liveMinPrice, $dbMinPrice)
    {
        if (is_null($dbMinPrice) && is_null($liveMinPrice)) {
            $this->Price = $product->GetPrice();
        } elseif (!is_null($dbMinPrice)) {
            $this->Price = $dbMinPrice->GetValue();
            $this->InDatabase = true;
        } elseif (is_null($dbMinPrice)) {
            $this->Price = $liveMinPrice['price'];
            $this->InLive = true;
        } else {
            $check = $dbMinPrice->GetValue() >= $liveMinPrice['price'];
            $this->Price = $check ? $dbMinPrice->GetValue() : $liveMinPrice['price'];
            $this->InDatabase = $check;
            $this->InLive = !$check;
        }
    }
}