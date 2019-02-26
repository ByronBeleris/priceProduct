<?php namespace App\Models\Contracts\Repositories;

use App\Models\Objects\Entities\Product;

/**
 * Interface for a product repository
 *
 * @package Application
 * @author Byron Beleris
 */


interface IProductRepository
{
    /**
     * Gets all accounts
     *
     * @return Product[] A collection of Product objects
     */
    function GetAll();


    /**
     * Gets a Product by id
     *
     * @param int $id
     * @return Product
     */
    function GetById( $id );

    /**
     * Gets a Product by sku
     *
     * @param string $sku
     * @return Product
     */
    function GetBySku( $sku );


    /**
     * Get all sku names based on the search term
     *
     * @param string $searchTerm
     * @return array
     */
    function GetNamesForAutoComplete( $searchTerm );

    /**
     * Creates a Product
     *
     * @param Product $product
     * @return Product
     */
    function Create( Product $product );

    /**
     * Updates a Product
     *
     * @param Product $product
     * @return Product
     */
    function Update( Product $product );

    /**
     * Deletes a Product by id
     *
     * @param int $id
     * @return void
     */
    function Delete( $id );

}