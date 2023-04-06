<?php

namespace Modules\Home\Http\Controllers\Checkout;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\Share\Http\Controllers\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CheckoutController extends Controller
{
    /**
     * Show checkout view page.
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     *
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        return view('Home::Pages.checkouts.index', ['carts' => session()->get('cart') ?? []]);
    }
}
