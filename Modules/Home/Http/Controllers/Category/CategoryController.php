<?php

namespace Modules\Home\Http\Controllers\Category;

use Modules\Category\Models\Category;
use Modules\Share\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function detail(Category $category)
    {
        $products = $category->products()->latest()->paginate(24);

        return view('Home::Pages.categories.detail', compact(['category', 'products']));
    }
}
