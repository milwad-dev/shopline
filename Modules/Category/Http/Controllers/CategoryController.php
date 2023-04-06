<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepoEloquentInterface;
use Modules\Category\Services\CategoryServiceInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class CategoryController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $redirectRoute = 'categories.index';

    private string $class = Category::class;

    public CategoryServiceInterface $service;
    public CategoryRepoEloquentInterface $repo;

    public function __construct(CategoryServiceInterface $categoryService, CategoryRepoEloquentInterface $categoryRepo)
    {
        $this->repo = $categoryRepo;
        $this->service = $categoryService;
    }

    /**
     * Read data with show list of categories.
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        $categories = $this->repo->getLatestCategories()->paginate();

        return view('Category::index', compact('categories'));
    }

    /**
     * Show create category page.
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('manage', $this->class);
        $parents = $this->repo->getLatestCategories()->get();

        return view('Category::create', compact('parents'));
    }

    /**
     * Store category with show message & redirect.
     *
     * @param CategoryRequest $request
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('manage', $this->class);
        $this->service->store($request);

        return $this->successMessageWithRedirect('Create category');
    }

    /**
     * Find category by id.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->authorize('manage', $this->class);
        $category = $this->repo->findById($id);
        $parents = $this->repo->getLatestCategories()->where('id', '!=', $category->id)->get();

        return view('Category::edit', compact(['category', 'parents']));
    }

    /**
     * Update category by id.
     *
     * @param CategoryRequest $request
     * @param                 $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('manage', $this->class);
        $this->service->update($request, $id);

        return $this->successMessageWithRedirect('Update category');
    }

    /**
     * Delete category by id.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->delete($id);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Change category status to active.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function active($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->changeStatus($id, CategoryStatusEnum::STATUS_ACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Change category status to inactive.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inactive($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->changeStatus($id, CategoryStatusEnum::STATUS_INACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }
}
