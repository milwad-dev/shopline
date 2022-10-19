<?php

namespace Modules\Cart\Http\Controllers;

use Modules\Cart\Services\CartService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class CartController extends Controller
{
    public function add($productId)
    {
        resolve(CartService::class)->add($productId);
dd(session()->all());
        ShareService::successToast('Add to cart successfully');
        return redirect()->back();
    }
}
