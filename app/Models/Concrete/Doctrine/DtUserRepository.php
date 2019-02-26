<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements a IUserRepository
 *
 * @package Application
 * @author ByronBeleris
 */

use \App\Models\Contracts\Repositories\IUserRepository;
use \App\Models\Objects\Entities\User;
use Doctrine\ORM\QueryBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;

class DtUserRepository implements IUserRepository
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
        $this->genericRepository->type = "\App\Models\Objects\Entities\User";
    }

    /**
     * Gets all users
     *
     * @return User[] A collection of User objects
     */
    public function GetAll()
    {
        return $this->genericRepository->GetAll();
    }


    /**
     * Gets a user by id
     *
     * @param int $id
     * @return User
     */
    public function GetById( $id )
    {
        return $this->genericRepository->GetById( $id );
    }

    /**
     * Gets a User by external reference
     *
     * @param string $ref
     * @return User
     */
    public function GetByRef( $ref ){
        return $this->genericRepository->GetEntityRepository()->findOneBy( array( 'externalReference' => $ref ) );
    }

    /**
     * Creates a User
     *
     * @param User $user
     * @return User
     */
    public function Create( User $user )
    {
        return $this->genericRepository->Create( $user );
    }

    /**
     * Updates a User
     *
     * @param User $user
     * @return User
     */
    public function Update( User $user )
    {
        return $this->genericRepository->Update( $user );
    }

    /**
     * Deletes a user by id
     *
     * @param int $id
     * @return void
     */
    public function Delete( $id )
    {
        $this->genericRepository->Delete( $id );
    }

    /**
     * Gets a user by email
     *
     * @param string $email
     * @return User|boolean
     */
    public function GetUserByEmail( $email )
    {
        /**
         * @var User $user
         */
        $user = $this->genericRepository->GetEntityRepository()->findOneBy( array( "email" => $email ) );
        if( $user )
        {
            return $user;
        }
        return false;
    }


}