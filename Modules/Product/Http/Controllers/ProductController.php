<?php

namespace Modules\Product\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Show index page of products.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Product::index');
    }

    /**
     * Show create product page.
     */
    public function create()
    {
        return view('Product::create');
    }
}
