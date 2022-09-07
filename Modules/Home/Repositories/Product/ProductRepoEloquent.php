<?php

namespace Modules\Home\Repositories\Product;

use Modules\Product\Models\Product;

class ProductRepoEloquent implements ProductRepoEloquentInterface
{
    /**
     *
     */
    public function getLatest()
    {
        return Product::query()
            ->active()
            ->latest();
    }
}
