<?php

namespace Modules\Home\Http\Controllers\Product;

use Modules\Home\Repositories\Product\ProductRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Get latest products.
     */
    public function index(ProductRepoEloquentInterface $productRepoEloquent)
    {
        $products = $productRepoEloquent->getLatest()->with(['user', 'first_media'])->paginate(16);

        return view('Home::Pages.products.index', compact(['products']));
    }

    /**
     * Detail product with sku & slug.
     */
    public function details($sku, $slug)
    {

    }
}
