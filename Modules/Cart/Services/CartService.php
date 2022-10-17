<?php

namespace Modules\Cart\Services;

use Modules\Product\Repositories\ProductRepoEloquent;
use Modules\Share\Services\ShareService;

class CartService implements CartServiceInterface
{
    public function add($productId)
    {
        $product = resolve(ProductRepoEloquent::class)->findById($productId);
        $cart = session()->get('cart');

        if ($this->check($productId)) {
            $cart[$productId]['quantity']++;
        } else {
            $product = $product->toArray();
            $product['quantity'] = 1;
            $cart[$productId] = $product;
        }

        session()->put('cart', $cart);

        ShareService::successToast('Add to cart successfully');
        return redirect()->back();
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
        return session()->has($id);
    }
}
