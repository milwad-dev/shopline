<?php

namespace Modules\Category\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Services\CategoryService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class CategoryController extends Controller
{
    public CategoryService $service;

    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }

    /**
     * Read data with show list of categories.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Category::Panel.index');
    }

    /**
     * Show create category page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('Category::Panel.create');
    }

    /**
     * Store category with show message & redirect.
     */
    public function store(CategoryRequest $request)
    {
        $this->service->store($request);

        return $this->successMessageWithRedirect('Create category');
    }

    /**
     * Show success message with redirect;
     *
     * @param  string $title
     * @return \Illuminate\Http\RedirectResponse
     */
    private function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('categories.index');
    }
}
