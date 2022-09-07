<?php

namespace Modules\Home\Http\Controllers\Product;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\Home\Repositories\Product\ProductRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Get latest products.
     *
     * @param  ProductRepoEloquentInterface $productRepoEloquent
     * @return Application|Factory|View
     */
    public function index(ProductRepoEloquentInterface $productRepoEloquent)
    {
        $products = $productRepoEloquent->getLatest()->with(['first_media'])->paginate(16);

        return view('Home::Pages.products.index', compact(['products']));
    }

    /**
     * Detail product with sku & slug.
     */
    public function details($sku, $slug)
    {

    }
}
