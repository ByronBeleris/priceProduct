<?php namespace App\Models\Contracts\Repositories;

/**
 * Interface for a account repository
 *
 * @package Application
 * @author Byron Beleris
 */

use App\Models\Objects\Entities\Account;

interface IAccountRepository
{
    /**
     * Gets all accounts
     *
     * @return Account[] A collection of Account objects
     */
    function GetAll();


    /**
     * Gets a Account by id
     *
     * @param int $id
     * @return Account
     */
    function GetById( $id );

    /**
     * Gets a Account by external reference
     *
     * @param string $ref
     * @return Account
     */
    function GetByRef( $ref );

    /**
     * Creates a Account
     *
     * @param Account $account
     * @return Account
     */
    function Create( Account $account );

    /**
     * Updates a Account
     *
     * @param Account $account
     * @return Account
     */
    function Update( Account $account );

    /**
     * Deletes a Account by id
     *
     * @param int $id
     * @return void
     */
    function Delete( $id );

}