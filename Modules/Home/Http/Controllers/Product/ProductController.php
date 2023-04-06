<?php

namespace Modules\Home\Http\Controllers\Product;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\Advertising\Enums\AdvertisingLocationEnum;
use Modules\Home\Repositories\Advertising\AdvertisingRepoEloquentInterface;
use Modules\Home\Repositories\Product\ProductRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Get latest products.
     *
     * @param ProductRepoEloquentInterface $productRepoEloquent
     *
     * @return Application|Factory|View
     */
    public function index(ProductRepoEloquentInterface $productRepoEloquent)
    {
        $products = $productRepoEloquent
            ->getLatest()
            ->with(['first_media'])
            ->withCount('rates')
            ->paginate(16);

        $advs = resolve(AdvertisingRepoEloquentInterface::class)
            ->getAdvertisingsByLocation(AdvertisingLocationEnum::LOCATION_PRODUCT_PAGE->value)
            ->with('media')
            ->limit(8)
            ->latest()
            ->get();

        return view('Home::Pages.products.index', compact(['products', 'advs']));
    }

    /**
     * Detail product with sku & slug.
     */
    public function details($sku, $slug, ProductRepoEloquentInterface $productRepoEloquent)
    {
        $product = $productRepoEloquent->findProductBySkuWithSlug($sku, $slug);
        $similarProducts = $productRepoEloquent->getSimilarProductsByCategories($product->categories);
        $advertising = resolve(AdvertisingRepoEloquentInterface::class)
            ->getAdvertisingsByLocation(AdvertisingLocationEnum::LOCATION_PRODUCT_DETAIL->value)
            ->with('media')
            ->first();

        return view('Home::Pages.products.details', compact(['product', 'similarProducts', 'advertising']));
    }
}
