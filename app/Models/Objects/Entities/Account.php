<?php namespace App\Models\Objects\Entities;

/**
 * Entity that holds a Account
 *
 * @author Byron Beleris
 */

use Doctrine\ORM\Mapping AS ORM;
use App\Models\Objects\Abstracts\BaseEntityModel;
use App\Models\Objects\Entities\Traits\Timestamps;

/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 * @ORM\HasLifecycleCallbacks()
 */
class Account extends BaseEntityModel
{
    use Timestamps;

    const FIELD_NAME = "Name";
    const FIELD_COMPANY = "Company";
    const FIELD_EXTERNAL_REFERENCE = "External reference";



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $company;

    /**
     * @ORM\Column(type="string", name="external_reference")
     */
    protected $externalReference;

    /**
     * Account constructor.
     */
    public function __construct()
    {
        $this->SetRules(
            array(
                self::FIELD_NAME => "required",
                self::FIELD_EXTERNAL_REFERENCE => "required|unique:accounts"
            )
        );
    }

    /**
     * Sets account id
     *
     * @param integer $id
     * @return void
     */
    public function SetId( $id )
    {
        $this->id = $id;
    }

    /**
     * Gets account id
     *
     * @return integer
     */
    public function GetId()
    {
        return $this->id;
    }

    /**
     * Sets account name
     *
     * @param string $name
     * @return void
     */
    public function SetName( $name )
    {
        $this->name = $name;
    }

    /**
     * Gets account name
     *
     * @return string|null
     */
    public function GetName()
    {
        return $this->name;
    }

    /**
     * Sets account company
     *
     * @param string|null $company
     * @return void
     */
    public function SetCompany( $company )
    {
        $this->company = $company;
    }

    /**
     * Gets account company
     *
     * @return string|null
     */
    public function GetCompany()
    {
        return $this->company;
    }

    /**
     * Sets account external reference
     *
     * @param string|null $externalReference
     * @return void
     */
    public function SetExternalReference( $externalReference )
    {
        $this->externalReference = $externalReference;
    }

    /**
     * Gets account external reference
     *
     * @return string|null
     */
    public function GetExternalReference()
    {
        return $this->externalReference;
    }



}
