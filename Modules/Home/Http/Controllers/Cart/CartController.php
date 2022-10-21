<?php

namespace Modules\Home\Http\Controllers\Cart;

use Modules\Share\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __invoke()
    {
        return view('Home::Pages.carts.index', ['carts' => session()->get('cart') ?? []]);
    }
}
