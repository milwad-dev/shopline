<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepoEloquentInterface;
use Modules\Category\Services\CategoryServiceInterface;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class CategoryController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $redirectRoute = 'categories.index';

    /**
     * Get class.
     *
     * @var string
     */
    private string $class = Category::class;

    public function __construct(
        public CategoryServiceInterface $service,
        public CategoryRepoEloquentInterface $repo,
    ) {}

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

        $this->uploadMedia($request);
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
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('manage', $this->class);

        $this->checkAndUploadMediaForUpdate($request, $category, 'media_id');
        $this->service->update($request, $category);

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

    // Private functions

    /**
     * Upload product medias.
     */
    private function uploadMedia(CategoryRequest $request): void
    {
        ShareService::uploadMediaWithAddInRequest($request);
    }

    /**
     * Check & upload for media.
     */
    private function checkAndUploadMediaForUpdate(CategoryRequest $request, Category $category, string $field): void
    {
        if (! is_null($request->image)) {
            ShareService::uploadMediaWithAddInRequest($request);
        } else {
            $request->request->add([$field => $category->media_id]);
        }
    }
}
