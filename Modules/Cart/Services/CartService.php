<?php

namespace Modules\Cart\Services;

use Modules\Product\Repositories\ProductRepoEloquent;

class CartService implements CartServiceInterface
{
    public function add($productId)
    {
        $product = resolve(ProductRepoEloquent::class)->findById($productId)->load('first_media');
        $cart = $this->checkCart($productId, session()->get('cart'), $product);

        session()->put('cart', $cart);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    public function removeAll()
    {
        // TODO: Implement removeAll() method.
    }

    public function check($id)
    {
        return session()->has("cart.$id");
    }

    # Static methods

    public static function handleTotalPrice()
    {
        $total = 0;

        foreach (session()->get('cart') as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    private function checkCart($productId, mixed $cart, $product): mixed
    {
        if ($this->check($productId)) {
            $cart[$productId]['quantity']++;
        } else {
            $firstMedia = $product->first_media->thumb;
            $product = $product->toArray();
            $product['quantity'] = 1;
            $product['first-media'] = $firstMedia;
            $cart[$productId] = $product;
        }

        return $cart;
    }
}
