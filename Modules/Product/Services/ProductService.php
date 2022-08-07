<?php

namespace Modules\Product\Services;

use Modules\Product\Models\Product;

class ProductService
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
        return Product::query();
    }
}
        