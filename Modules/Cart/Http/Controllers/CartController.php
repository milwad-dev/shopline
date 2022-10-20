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

    /**
     * Add product into session by product id & show success messag with redirect.
     *
     * @param  $productId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function add($productId)
    {
        $this->service->add($productId);

        return $this->sucessMessageWithRedirect('Add to cart successfully');
    }

    /**
     * Delete product from session by product id.
     *
     * @param  $productId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function delete($productId)
    {
        $this->service->remove($productId);

        return $this->sucessMessageWithRedirect('Remove item from cart successfully');
    }

    /**
     * Delete all products from cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll()
    {
        $this->service->removeAll();

        return $this->sucessMessageWithRedirect('All item deleted from cart successfully');
    }

    # Private methods

    /**
     * Show success message with redirect.
     *
     * @param  string $title
     * @return \Illuminate\Http\RedirectResponse
     */
    private function sucessMessageWithRedirect(string $title): \Illuminate\Http\RedirectResponse
    {
        ShareService::successToast($title);
        return redirect()->back();
    }
}
