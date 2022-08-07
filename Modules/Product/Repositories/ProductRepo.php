<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;

class ProductRepo
{
    public function index()
    {

    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {

    }

    private function query()
    {
        return Product::query();
    }
}
