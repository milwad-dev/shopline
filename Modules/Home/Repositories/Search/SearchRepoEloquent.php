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
            ->where('vendor.name', 'LIKE', "%$search%")
            ->orWhere('title', 'LIKE', "%$search%")
            ->where('sku', 'LIKE', "%$search%")
            ->where('price', 'LIKE', "%$search%")
            ->where('type', 'LIKE', "%$search%")
            ->where('body', 'LIKE', "%$search%")
            ->latest()
            ->paginate(15);
    }
}
