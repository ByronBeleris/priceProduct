<?php namespace App\Models\Objects\Entities;

use App\Models\Objects\Abstracts\BaseEntityModel;
use Doctrine\ORM\Mapping AS ORM;
use App\Models\Objects\Entities\Traits\Timestamps;

/**
 * Entity that holds a Price
 *
 * @author Byron Beleris
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="prices")
 * @ORM\HasLifecycleCallbacks()
 */
class Price extends BaseEntityModel
{
    use Timestamps;

    const FIELD_QUANTITY = "Quantity";
    const FIELD_VALUE = "Value";



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    protected $product;

    /**
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     **/
    protected $account;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    protected $user;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity;

    /**
     * @ORM\Column(type="float")
     */
    protected $value;
    

    /**
     * price constructor.
     */
    public function __construct()
    {
        $this->SetRules(
            array(
                self::FIELD_QUANTITY => "required",
                self::FIELD_VALUE => "required",
            )
        );
    }

    /**
     * Sets price id
     *
     * @param integer $id
     * @return void
     */
    public function SetId( $id )
    {
        $this->id = $id;
    }

    /**
     * Gets price id
     *
     * @return integer
     */
    public function GetId()
    {
        return $this->id;
    }

    /**
     * Sets price product
     *
     * @param Product $product
     * @return void
     */
    public function SetProduct( $product )
    {
        $this->product = $product;
    }

    /**
     * Gets price product
     *
     * @return Product
     */
    public function GetProduct()
    {
        return $this->product;
    }

    /**
     * Sets price account
     *
     * @param Account $account
     * @return void
     */
    public function SetAccount( $account )
    {
        $this->account = $account;
    }

    /**
     * Gets price account
     *
     * @return Account
     */
    public function GetAccount()
    {
        return $this->account;
    }

    /**
     * Sets price user
     *
     * @param User $user
     * @return void
     */
    public function SetUser( $user )
    {
        $this->user = $user;
    }

    /**
     * Gets price user
     *
     * @return User
     */
    public function GetUser()
    {
        return $this->user;
    }

    /**
     * Sets price quantity
     *
     * @param integer $quantity
     * @return void
     */
    public function SetQuantity( $quantity )
    {
        $this->quantity = $quantity;
    }

    /**
     * Gets price quantity
     *
     * @return integer|null
     */
    public function GetQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets price value
     *
     * @param float $value
     * @return void
     */
    public function SetValue( $value )
    {
        $this->value = $value;
    }

    /**
     * Gets price value
     *
     * @return float|null
     */
    public function GetValue()
    {
        return $this->value;
    }
}