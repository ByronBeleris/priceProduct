<?php namespace App\Models\Objects\ViewModels;

use App\Models\Objects\Entities\Account;
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
    public $AccountName;
    public $AccountId;
    public $Name;
    public $Description;
    public $Price;
    public $InDatabase;

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
     * @param Account $account
     * @return void
     */
    public function Map(Product $product, Account $account = null)
    {
        $this->Id = $product->GetId();
        $this->Sku = $product->GetSku();
        $this->AccountName = is_null($account) ? null : $account->GetName();
        $this->AccountId = is_null($account) ? null : $account->GetId();
        $this->Name = $product->GetName();
        $this->Description = $product->GetDescription();
    }
}