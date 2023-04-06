<?php

namespace Modules\Home\Repositories\Home;

use Illuminate\Database\Eloquent\Collection;
use Modules\Advertising\Models\Advertising;
use Modules\Article\Models\Article;
use Modules\Category\Models\Category;
use Modules\Product\Models\Product;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;

class HomeRepoEloquent implements HomeRepoEloquentInterface
{
    /**
     * Get latest active sliders.
     *
     * @return Collection|\Illuminate\Database\Eloquent\Builder[]
     */
    public function getLatestSliders()
    {
        return Slider::query()
            ->where('status', SliderStatusEnum::STATUS_ACTIVE->value)
            ->latest()
            ->limit(1)
            ->get();
    }

    /**
     * Get latest active categories.
     *
     * @return Collection
     */
    public function getLatestCategories()
    {
        return Category::query()
            ->active()
            ->latest()
            ->get();
    }

    /**
     * Get latest active products.
     *
     * @return mixed
     */
    public function getLatestActiveProducts()
    {
        return Product::query()
            ->with('first_media')
            ->active()
            ->latest()
            ->limit(10)
            ->get();
    }

    /**
     * Get latest popular products.
     *
     * @return Collection
     */
    public function getLatestPopularProducts()
    {
        return Product::query()
            ->with('first_media')
            ->popular()
            ->latest()
            ->limit(4)
            ->get();
    }

    /**
     * Get latest advs by location.
     *
     * @param string $location
     *
     * @return mixed
     */
    public function getOneLatestAdvByLocation(string $location)
    {
        return Advertising::query()
            ->with('media')
            ->active()
            ->where('location', $location);
    }

    /**
     * Get product by views.
     *
     * @return mixed
     */
    public function getProductsByViews()
    {
        return Product::query()
            ->with('first_media')
            ->withCount('rates')
            ->active()
            ->orderByUniqueViews()
            ->limit(4)
            ->get();
    }

    /**
     * Get random products.
     *
     * @return mixed
     */
    public function getRandomProducts()
    {
        return Product::query()
            ->with('first_media')
            ->withCount('rates')
            ->active()
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    /**
     * Get top-rated products.
     *
     * @return mixed
     */
    public function getTopRatedProducts()
    {
        return Product::query()
            ->with('first_media')
            ->active()
            ->withCount('rates')
            ->orderByDesc('rates_count')
            ->limit(4)
            ->get();
    }

    /**
     * Get latest articles.
     *
     * @return mixed
     */
    public function getLatestArticles()
    {
        return Article::query()
            ->with('media')
            ->active()
            ->latest()
            ->limit(5)
            ->get();
    }
}
