<?php

namespace Modules\Category\Http\Controllers\Panel;

use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Category\Services\CategoryService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
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
        $parents = $this->repo->index()->get();

        return view('Category::Panel.create', compact('parents'));
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
        $parents = $this->repo->index()->where('id', '!=', $category->id)->get();

        return view('Category::Panel.edit', compact(['category', 'parents']));
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
     * Delete category by id.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->repo->delete($id);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Change category status to active.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active($id)
    {
        $this->repo->changeStatus($id, CategoryStatusEnum::STATUS_ACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Change category status to inactive.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function inactive($id)
    {
        $this->repo->changeStatus($id, CategoryStatusEnum::STATUS_INACTIVE->value);

        return AjaxResponses::SuccessResponse();
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
