<?php

namespace Modules\Cart\Services;

use Modules\Product\Repositories\ProductRepoEloquent;

class CartService implements CartServiceInterface
{
    /**
     * Add product into cart in session by product id.
     *
     * @param  $productId
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function add($productId)
    {
        $product = resolve(ProductRepoEloquent::class)->findById($productId)->load('first_media');
        $cart = $this->checkCart($productId, session()->get('cart'), $product);

        session()->put('cart', $cart);
    }

    /**
     * Remove product from session by product id.
     *
     * @param  $productId
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function remove($productId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= 1;
            } else {
                unset($cart[$productId]);
            }

            session()->put('cart', $cart);
        }
    }

    /**
     * Remove cart session.
     *
     * @return void
     */
    public function removeAll()
    {
        session()->forget('cart');
    }

    /**
     * Check item in cart by id.
     *
     * @param  $id
     * @return bool
     */
    public function check($id)
    {
        return session()->has("cart.$id");
    }

    # Static methods

    /**
     * Handle total price.
     *
     * @return  float|int
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function handleTotalPrice()
    {
        $total = 0;

        if (! is_null(session()->get('cart'))) {
            foreach (session()->get('cart') as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return $total;
    }

    /**
     * Handle one product price.
     *
     * @param  $productId
     * @return float|int
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function handleTotalOneItemPrice($productId)
    {
        $product = (object) session()->get('cart')[$productId];

        if (is_null($product)) {
            return 0;
        }

        return $product->price * $product->quantity;
    }

    # Private methods

    /**
     * Check & store item.
     *
     * @param  $productId
     * @param  mixed $cart
     * @param  $product
     * @return mixed
     */
    private function checkCart($productId, mixed $cart, $product): mixed
    {
        if ($this->check($productId)) {
            $cart[$productId]['quantity']++;
        } else {
            $firstMedia = optional($product->first_media)->thumb;
            $product = $product->toArray();
            $product['quantity'] = 1;
            $product['first-media'] = $firstMedia;
            $cart[$productId] = $product;
        }

        return $cart;
    }
}
