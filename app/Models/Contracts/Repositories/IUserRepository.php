<?php namespace App\Models\Contracts\Repositories;

/**
 * Interface for a user repository
 *
 * @package Application
 * @author Byron Beleris
 */

use \App\Models\Objects\Entities\User;

interface IUserRepository
{
    /**
     * Gets all users
     *
     * @return User[] A collection of User objects
     */
    function GetAll();


    /**
     * Gets a user by id
     *
     * @param int $id
     * @return User
     */
    function GetById( $id );

    /**
     * Gets a User by external reference
     *
     * @param string $ref
     * @return User
     */
    function GetByRef( $ref );

    /**
     * Creates a User
     *
     * @param User $user
     * @return User
     */
    function Create( User $user );

    /**
     * Updates a User
     *
     * @param User $user
     * @return User
     */
    function Update( User $user );

    /**
     * Deletes a user by id
     *
     * @param int $id
     * @return void
     */
    function Delete( $id );

    /**
     * Gets a user by email
     *
     * @param string $email
     * @return User|boolean
     */
    function GetUserByEmail( $email );


}