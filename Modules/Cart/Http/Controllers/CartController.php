<?php

namespace Modules\Cart\Http\Controllers;

use Modules\Cart\Services\CartService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class CartController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    /**
     * Redirect route.
     *
     * @var mixed|null
     */
    private mixed $redirectRoute = null;

    public CartService $service;

    public function __construct(CartService $cartService)
    {
        $this->service = $cartService;
    }

    /**
     * Add product into session by product id & show success messag with redirect.
     *
     * @param $productId
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($productId)
    {
        $this->service->add($productId);

        return $this->successMessageWithRedirect('Add to cart successfully');
    }

    /**
     * Delete product from session by product id.
     *
     * @param $productId
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($productId)
    {
        $this->service->remove($productId);

        return $this->successMessageWithRedirect('Remove item from cart successfully');
    }

    /**
     * Delete all products from cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll()
    {
        $this->service->removeAll();

        return $this->successMessageWithRedirect('All item deleted from cart successfully');
    }
}
