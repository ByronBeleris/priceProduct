<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements a IUserRepository
 *
 * @package Application
 * @author ByronBeleris
 */

use App\Models\Contracts\Repositories\IProductRepository;
use App\Models\Objects\Entities\Product;
use Doctrine\ORM\QueryBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;

class DtProductRepository implements IProductRepository
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
        $this->genericRepository->type = "\App\Models\Objects\Entities\Product";
    }

    /**
     * Gets all products
     *
     * @return Product[] A collection of Product objects
     */
    public function GetAll()
    {
        return $this->genericRepository->GetAll();
    }


    /**
     * Gets a product by id
     *
     * @param int $id
     * @return Product
     */
    public function GetById( $id )
    {
        return $this->genericRepository->GetById( $id );
    }

    /**
     * Gets a Product by sku
     *
     * @param string $sku
     * @return Product
     */
    public function GetBySku( $sku )
    {
        return $this->genericRepository->GetEntityRepository()->findOneBy( array( 'sku' => $sku ) );
    }


    /**
     * Creates a Product
     *
     * @param Product $product
     * @return Product
     */
    public function Create( Product $product )
    {
        return $this->genericRepository->Create( $product );
    }

    /**
     * Updates a Product
     *
     * @param Product $product
     * @return Product
     */
    public function Update( Product $product )
    {
        return $this->genericRepository->Update( $product );
    }

    /**
     * Deletes a product by id
     *
     * @param int $id
     * @return void
     */
    public function Delete( $id )
    {
        $this->genericRepository->Delete( $id );
    }



}