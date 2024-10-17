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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
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
     *
     * @return RedirectResponse
     *
     * @throws AuthorizationException
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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
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
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthorizationException
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
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws AuthorizationException
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
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws AuthorizationException
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
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws AuthorizationException
     */
    public function inactive($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->changeStatus($id, CategoryStatusEnum::STATUS_INACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }
}
