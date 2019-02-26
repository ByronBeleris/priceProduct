<?php namespace App\Models\Objects\Entities;

use App\Models\Objects\Abstracts\BaseEntityModel;
use Doctrine\ORM\Mapping AS ORM;
use App\Models\Objects\Entities\Traits\Timestamps;

/**
 * Entity that holds a Product
 *
 * @author Byron Beleris
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 * @ORM\HasLifecycleCallbacks()
 */
class Product extends BaseEntityModel
{
    use Timestamps;

    const FIELD_NAME = "Name";
    const FIELD_SKU = "Sku";
    const FIELD_PRICE = "Price";
    const FIELD_DESCRIPTION= "Description";


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $sku;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * product constructor.
     */
    public function __construct()
    {
        $this->SetRules(
            array(
                self::FIELD_NAME => "required|email|min:6",
                self::FIELD_SKU => "required",
                self::FIELD_PRICE => "required",
            )
        );
    }

    /**
     * Sets product id
     *
     * @param integer $id
     * @return void
     */
    public function SetId( $id )
    {
        $this->id = $id;
    }

    /**
     * Gets product id
     *
     * @return integer
     */
    public function GetId()
    {
        return $this->id;
    }

    /**
     * Sets product name
     *
     * @param string $name
     * @return void
     */
    public function SetName( $name )
    {
        $this->name = $name;
    }

    /**
     * Gets product name
     *
     * @return string|null
     */
    public function GetName()
    {
        return $this->name;
    }

    /**
     * Sets product sku
     *
     * @param string $sku
     * @return void
     */
    public function SetSku( $sku )
    {
        $this->sku = $sku;
    }

    /**
     * Gets product sku
     *
     * @return string|null
     */
    public function GetSku()
    {
        return $this->sku;
    }

    /**
     * Sets product description
     *
     * @param string $sku
     * @return void
     */
    public function SetDescription( $sku )
    {
        $this->sku = $sku;
    }

    /**
     * Gets product description
     *
     * @return string|null
     */
    public function GetDescription()
    {
        return $this->description;
    }

    /**
     * Sets product price
     *
     * @param float $price
     * @return void
     */
    public function SetPrice( $price )
    {
        $this->price = $price;
    }

    /**
     * Gets product price
     *
     * @return float|null
     */
    public function GetPrice()
    {
        return $this->price;
    }

}