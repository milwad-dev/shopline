<?php

namespace Modules\Cart\Services;

use Modules\Cart\Models\Cart;

class CartService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    private function query()
    {
        return Cart::query();
    }
}
        