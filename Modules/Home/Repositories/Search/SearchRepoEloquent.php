<?php

namespace Modules\Home\Repositories\Search;

use Modules\Product\Models\Product;

class SearchRepoEloquent
{
    /**
     * Search products.
     *
     * @param  string $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchProducts(string $search)
    {
        return Product::query()
            ->orWhere('title', 'LIKE', "%$search%")
            ->orWhere('sku', 'LIKE', "%$search%")
            ->orWhere('price', 'LIKE', "%$search%")
            ->orWhere('type', 'LIKE', "%$search%")
            ->orWhere('body', 'LIKE', "%$search%")
            ->latest()
            ->paginate(15);
    }
}
