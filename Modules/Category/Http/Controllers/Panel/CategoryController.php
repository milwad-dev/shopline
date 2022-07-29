<?php

namespace Modules\Category\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Category\Services\CategoryService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class CategoryController extends Controller
{
    public CategoryService $service;
    public CategoryRepo $repo;

    public function __construct(CategoryService $categoryService, CategoryRepo $categoryRepo)
    {
        $this->repo = $categoryRepo;
        $this->service = $categoryService;
    }

    /**
     * Read data with show list of categories.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->repo->index()->paginate();

        return view('Category::Panel.index', compact('categories'));
    }

    /**
     * Show create category page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->repo->index()->get();

        return view('Category::Panel.create', compact('categories'));
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
     * Find category by id.
     *
     * @param  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = $this->repo->findById($id);
        $categories = $this->repo->index()->get();

        return view('Category::Panel.edit', compact(['category', 'categories']));
    }

    /**
     * Update category by id.
     *
     * @param  CategoryRequest $request
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->service->update($request, $id);

        return $this->successMessageWithRedirect('Update category');
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
