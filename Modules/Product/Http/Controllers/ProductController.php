<?php

namespace Modules\Product\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('Product::index');
    }
}
