<?php

namespace Modules\Home\Http\Controllers\Category;

use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
use Modules\Share\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Get products from category and show view page.
     *
     * @param Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(Category $category)
    {
        abort_if($category->status !== CategoryStatusEnum::STATUS_ACTIVE->value, 404);

        $products = $category->products()->latest()->paginate(24);

        return view('Home::Pages.categories.detail', compact(['category', 'products']));
    }
}
