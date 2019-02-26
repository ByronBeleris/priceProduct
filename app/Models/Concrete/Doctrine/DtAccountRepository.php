<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements a IUserRepository
 *
 * @package Application
 * @author ByronBeleris
 */

use App\Models\Contracts\Repositories\IAccountRepository;
use App\Models\Objects\Entities\Account;
use Doctrine\ORM\QueryBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;

class DtAccountRepository implements IAccountRepository
{
    private $genericRepository;

    /**
     * On instantiation
     * Instantiates a DtGenericRepository
     * Sets the Entity type
     */
    public function __construct( )
    {
        $this->genericRepository = new DtGenericRepository();
        $this->genericRepository->type = "\App\Models\Objects\Entities\Account";
    }

    /**
     * Gets all accounts
     *
     * @return Account[] A collection of Account objects
     */
    public function GetAll()
    {
        return $this->genericRepository->GetAll();
    }


    /**
     * Gets a account by id
     *
     * @param int $id
     * @return Account
     */
    public function GetById( $id )
    {
        return $this->genericRepository->GetById( $id );
    }

    /**
     * Gets a Account by external reference
     *
     * @param string $ref
     * @return Account
     */
    public function GetByRef( $ref ){
        return $this->genericRepository->GetEntityRepository()->findOneBy( array( 'externalReference' => $ref ) );
    }

    /**
     * Creates a Account
     *
     * @param Account $account
     * @return Account
     */
    public function Create( Account $account )
    {
        return $this->genericRepository->Create( $account );
    }

    /**
     * Updates a Account
     *
     * @param Account $account
     * @return Account
     */
    public function Update( Account $account )
    {
        return $this->genericRepository->Update( $account );
    }

    /**
     * Deletes a account by id
     *
     * @param int $id
     * @return void
     */
    public function Delete( $id )
    {
        $this->genericRepository->Delete( $id );
    }



}