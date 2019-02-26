<?php
/**
 * Created by PhpStorm.
 * User: Byron Beleris
 * Date: 2019-02-26
 * Time: 03:15
 */

namespace App\Http\Controllers;

use App\Models\Contracts\IUnitOfWork;
class PriceController extends Controller
{

    /**
     * @var IUnitOfWork
     */
    private $unitOfWork;


    /**
     * PriceController constructor.
     *
     * @param IUnitOfWork $uow
     */
    public function __construct(IUnitOfWork $uow)
    {
        $this->unitOfWork = $uow;
    }

    /**
     * Returns the live price view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function GetDisplayLivePrices()
    {
        return view('Price/live_prices');
    }

}