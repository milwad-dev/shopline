<?php

namespace Modules\Cart\Http\Controllers;

use Modules\Cart\Services\CartService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class CartController extends Controller
{
    public CartService $service;

    public function __construct(CartService $cartService)
    {
        $this->service = $cartService;
    }

    public function add($productId)
    {
        $this->service->add($productId);

        return $this->sucessMessageWithRedirect('Add to cart successfully');
    }

    public function delete($productId)
    {
        $this->service->remove($productId);

        return $this->sucessMessageWithRedirect('Remove item from cart successfully');
    }

    private function sucessMessageWithRedirect(string $title): \Illuminate\Http\RedirectResponse
    {
        ShareService::successToast($title);
        return redirect()->back();
    }
}
