<?php

namespace Modules\Home\Http\Controllers\Product;

use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Get latest products.
     */
    public function index()
    {
        return view('Home::Pages.products.index');
    }

    /**
     * Detail product with sku & slug.
     */
    public function details($sku, $slug)
    {

    }
}
