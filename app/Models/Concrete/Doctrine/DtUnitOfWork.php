<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements the IUnitOfWork DtUnitOfWork
 *
 * @package Application
 * @author ByronBeleris
 */

use \App\Models\Contracts\IUnitOfWork;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;

class DtUnitOfWork implements IUnitOfWork
{
    /**
     * @var EntityManager
     */
    private $em;

    private $genericRepository = NULL;
    private $userRepository = NULL;
    private $accountRepository = NULL;
    private $priceRepository = NULL;
    private $productRepository = NULL;


    public function __construct( EntityManager $em = null )
    {
        $this->em = $em;
    }

    /**
     * Sets and returns a generic repository
     * @return DtGenericRepository
     */
    public function GenericRepository()
    {
        if( is_null( $this->genericRepository ) )
        {
            $this->genericRepository = new DtGenericRepository();
        }
        return $this->genericRepository;
    }

    /**
     * Sets and returns a account repository
     * @return \App\Models\Concrete\Doctrine\DtAccountRepository
     */
    public function AccountRepository()
    {
        if( is_null( $this->accountRepository ) )
        {
            $this->accountRepository = new DtAccountRepository();
        }
        return $this->accountRepository;
    }

    /**
     * Sets and returns a user repository
     * @return \App\Models\Concrete\Doctrine\DtUserRepository
     */
    public function UserRepository()
    {
        if( is_null( $this->userRepository ) )
        {
            $this->userRepository = new DtUserRepository();
        }
        return $this->userRepository;
    }

    /**
     * Sets and returns a price repository
     * @return \App\Models\Concrete\Doctrine\DtPriceRepository
     */
    public function PriceRepository()
    {
        if( is_null( $this->priceRepository ) )
        {
            $this->priceRepository = new DtPriceRepository();
        }
        return $this->priceRepository;
    }

    /**
     * Sets and returns a product repository
     * @return \App\Models\Concrete\Doctrine\DtProductRepository
     */
    public function ProductRepository()
    {
        if( is_null( $this->productRepository ) )
        {
            $this->productRepository = new DtProductRepository();
        }
        return $this->productRepository;
    }
}
