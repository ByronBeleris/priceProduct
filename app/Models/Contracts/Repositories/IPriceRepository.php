<?php namespace App\Models\Contracts\Repositories;


use App\Models\Objects\Entities\Price;

/**
 * Interface for a price repository
 *
 * @package Application
 * @author Byron Beleris
 */


interface IPriceRepository
{
    /**
     * Gets all accounts
     *
     * @return Price[] A collection of Price objects
     */
    function GetAll();


    /**
     * Gets a Price by id
     *
     * @param int $id
     * @return Price
     */
    function GetById( $id );

    /**
     * Creates a Price
     *
     * @param Price $price
     * @return Price
     */
    function Create( Price $price );

    /**
     * Updates a Price
     *
     * @param Price $price
     * @return Price
     */
    function Update( Price $price );

    /**
     * Deletes a Price by id
     *
     * @param int $id
     * @return void
     */
    function Delete( $id );

    /**
     * Gets the min price from given product sku and account Id
     *
     * @param mixed $productSku
     * @param mixed $accountNumber
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    function GetMinPriceByProductAndAccount( $productSku, $accountNumber = null);
}