<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Article\Enums\ArticleStatusEnum;
use Modules\Article\Http\Requests\ArticleRequest;
use Modules\Article\Models\Article;
use Modules\Article\Repositories\ArticleRepoEloquentInterface;
use Modules\Article\Services\ArticleServiceInterface;
use Modules\Category\Repositories\CategoryRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class ArticleController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $class = Article::class;

    private string $redirectRoute = 'articles.index';

    public ArticleRepoEloquentInterface $repo;
    public ArticleServiceInterface $service;

    public CategoryRepoEloquentInterface $categoryRepo;

    public function __construct(
        ArticleRepoEloquentInterface $articleRepo,
        ArticleServiceInterface $articleService,
        CategoryRepoEloquentInterface $categoryRepo
    ) {
        $this->repo = $articleRepo;
        $this->service = $articleService;

        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        $articles = $this->repo->getLatestArticles()->with('media')->paginate();

        return view('Article::index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('manage', $this->class);
        $categories = $this->categoryRepo->getActiveCategories()->get();

        return view('Article::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $this->authorize('manage', $this->class);

        ShareService::uploadMediaWithAddInRequest($request);

        $article = $this->service->store($request);
        $article->categories()->attach($request->categories);

        return $this->successMessageWithRedirect('Create article');
    }

    /**
     * Show edit page by id.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $this->authorize('manage', $this->class);
        $article = $this->repo->findById($id);
        $categories = $this->categoryRepo->getActiveCategories()->get();

        return view('Article::edit', compact(['article', 'categories']));
    }

    /**
     * Update article by id.
     *
     * @param ArticleRequest $request
     * @param                $id
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $this->authorize('manage', $this->class);
        $product = $this->repo->findById($id);

        if (!is_null($request->image)) {
            ShareService::uploadMediaWithAddInRequest($request);
        } else {
            $request->request->add(['media_id' => $product->media_id]);
        }

        $this->service->update($request, $id);

        return $this->successMessageWithRedirect('Update article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->delete($id);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Change article status by id.
     *
     * @param        $id
     * @param string $status
     *
     * @throws AuthorizationException
     *
     * @return JsonResponse
     */
    public function changeStatus($id, string $status)
    {
        $this->authorize('manage', $this->class);

        $active = ArticleStatusEnum::STATUS_ACTIVE->value;
        $in_progress = ArticleStatusEnum::STATUS_IN_PROGRESS->value;
        $inactive = ArticleStatusEnum::STATUS_INACTIVE->value;

        switch ($status) {
            case $active:
                $this->service->changeStatus($id, $active);
                break;
            case $in_progress:
                $this->service->changeStatus($id, $in_progress);
                break;
            case $inactive:
                $this->service->changeStatus($id, $inactive);
                break;
            default:
                return AjaxResponses::FailedResponse();
        }

        return AjaxResponses::SuccessResponse();
    }
}
