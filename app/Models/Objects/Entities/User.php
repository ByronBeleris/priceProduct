<?php namespace App\Models\Objects\Entities;

/**
 * Entity that holds a User
 *
 * @author Byron Beleris
 */

use Doctrine\ORM\Mapping AS ORM;
use App\Models\Objects\Abstracts\BaseEntityModel;
use App\Models\Objects\Entities\Traits\Timestamps;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseEntityModel
{
    use Timestamps;

    const FIELD_NAME = "Name";
    const FIELD_EMAIL = "Email";
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
    protected $email;

    /**
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     **/
    protected $account;

    /**
     * @ORM\Column(type="string", name="external_reference")
     */
    protected $externalReference;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->SetRules(
            array(
                self::FIELD_NAME => "required|email|min:6",
                self::FIELD_EMAIL => "required",
                self::FIELD_EXTERNAL_REFERENCE => "required|unique:accounts"
            )
        );
    }

    /**
     * Sets user id
     *
     * @param integer $id
     * @return void
     */
    public function SetId( $id )
    {
        $this->id = $id;
    }

    /**
     * Gets user id
     *
     * @return integer
     */
    public function GetId()
    {
        return $this->id;
    }

    /**
     * Sets user name
     *
     * @param string $name
     * @return void
     */
    public function SetName( $name )
    {
        $this->name = $name;
    }

    /**
     * Gets user name
     *
     * @return string|null
     */
    public function GetName()
    {
        return $this->name;
    }

    /**
     * Sets user email
     *
     * @param string $email
     * @return void
     */
    public function SetEmail( $email )
    {
        $this->email = $email;
    }

    /**
     * Gets user email
     *
     * @return string|null
     */
    public function GetEmail()
    {
        return $this->email;
    }

    /**
     * Sets user account
     *
     * @param Account $account
     * @return void
     */
    public function SetAccount( $account )
    {
        $this->account = $account;
    }

    /**
     * Gets user account
     *
     * @return Account
     */
    public function GetAccount()
    {
        return $this->account;
    }

    /**
     * Sets user external reference
     *
     * @param string|null $externalReference
     * @return void
     */
    public function SetExternalReference( $externalReference )
    {
        $this->externalReference = $externalReference;
    }

    /**
     * Gets user external reference
     *
     * @return string|null
     */
    public function GetExternalReference()
    {
        return $this->externalReference;
    }



}
