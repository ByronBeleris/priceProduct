<?php namespace App\Models\Contracts;

use App\Models\Concrete\Doctrine\DtGenericRepository;

/**
 * Interface for the unit of work
 *
 * @package Application
 * @author Byron Beleris
 */
interface IUnitOfWork
{
    /**
     * @return DtGenericRepository
     */
    function GenericRepository();

    /**
     * This returns an instance of a user repository
     *
     * @return \App\Models\Contracts\Repositories\IUserRepository
     */
    function UserRepository();

    /**
     * This returns an instance of a account repository
     *
     * @return \App\Models\Contracts\Repositories\IAccountRepository
     */
    function AccountRepository();

    /**
     * This returns an instance of a product repository
     *
     * @return \App\Models\Contracts\Repositories\IProductRepository
     */
    function ProductRepository();

    /**
     * This returns an instance of a price repository
     *
     * @return \App\Models\Contracts\Repositories\IPriceRepository
     */
    function PriceRepository();


}
