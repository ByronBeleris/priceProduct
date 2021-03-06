<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements a IUserRepository
 *
 * @package Application
 * @author ByronBeleris
 */

use App\Models\Contracts\Repositories\IPriceRepository;
use App\Models\Objects\Entities\Price;
use Doctrine\ORM\QueryBuilder;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;

class DtPriceRepository implements IPriceRepository
{
    private $genericRepository;

    /**
     * On instantiation
     * Instantiates a DtGenericRepository
     * Sets the Entity type
     */
    public function __construct()
    {
        $this->genericRepository = new DtGenericRepository();
        $this->genericRepository->type = "\App\Models\Objects\Entities\Price";
    }

    /**
     * Gets all prices
     *
     * @return Price[] A collection of Price objects
     */
    public function GetAll()
    {
        return $this->genericRepository->GetAll();
    }


    /**
     * Gets a price by id
     *
     * @param int $id
     * @return Price
     */
    public function GetById($id)
    {
        return $this->genericRepository->GetById($id);
    }

    /**
     * Creates a Price
     *
     * @param Price $price
     * @return Price
     */
    public function Create(Price $price)
    {
        return $this->genericRepository->Create($price);
    }

    /**
     * Updates a Price
     *
     * @param Price $price
     * @return Price
     */
    public function Update(Price $price)
    {
        return $this->genericRepository->Update($price);
    }

    /**
     * Deletes a price by id
     *
     * @param int $id
     * @return void
     */
    public function Delete($id)
    {
        $this->genericRepository->Delete($id);
    }

    /**
     * Gets the min price from given product sku and account Id
     *
     * @param mixed $productSku
     * @param mixed $accountNumber
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function GetMinPriceByProductAndAccount( $productSku, $accountNumber = null)
    {
        $entityManager = $this->genericRepository->GetEntityManager();
        $entityName = $this->genericRepository->GetEntityName();
        $query = $entityManager->createQueryBuilder()->select("price")
            ->from($entityName, "price")
            ->leftJoin("price.product", "product")
            ->leftJoin("price.account", "account")
            ->where('product.sku = :productSku');
        if (!is_null($accountNumber)) {
            $query->andWhere('account.externalReference = :accountNumber')
                ->setParameter('accountNumber', $accountNumber);
        }
        $query->setParameter('productSku', $productSku)
            ->orderBy('price.value', 'ASC')
            ->setMaxResults(1);
        return $query->getQuery()->getOneOrNullResult();
    }


}