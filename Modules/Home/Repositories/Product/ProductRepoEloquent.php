<?php

namespace Modules\Home\Repositories\Product;

use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\Product;

class ProductRepoEloquent implements ProductRepoEloquentInterface
{
    /**
     * Get active latest products.
     *
     * @return mixed
     */
    public function getLatest()
    {
        return Product::query()
            ->active()
            ->latest();
    }

    /**
     * Find product by sku & slug.
     *
     * @param $sku
     * @param $slug
     *
     * @return mixed
     */
    public function findProductBySkuWithSlug($sku, $slug)
    {
        return Product::query()
            ->with(['galleries', 'categories', 'tags', 'attributes'])
            ->withCount('rates')
            ->active()
            ->where('sku', (int) $sku)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Get similar products by categories.
     *
     * @param array|object $categories
     *
     * @return Collection
     */
    public function getSimilarProductsByCategories(array|object $categories)
    {
        $categories = collect($categories)->pluck('title')->toArray();

        return Product::query()
            ->with('first_media')
            ->withCount('rates')
            ->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('title', $categories);
            })
            ->limit(20)
            ->get();
    }
}
