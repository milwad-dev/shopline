<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Article\Http\Requests\ArticleRequest;
use Modules\Article\Models\Article;
use Modules\Article\Repositories\ArticleRepo;
use Modules\Article\Services\ArticleService;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class ArticleController extends Controller
{
    public ArticleRepo $repo;
    public ArticleService $service;

    public function __construct(ArticleRepo $articleRepo, ArticleService $articleService)
    {
        $this->repo = $articleRepo;
        $this->service = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = $this->repo->getLatestArticles()->paginate();

        return view('Article::index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(CategoryRepo $categoryRepo)
    {
        $categories = $categoryRepo->getActiveCategories()->get();

        return view('Article::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $this->service->store($request);

        return $this->successMessageWithRedirect('Create article');
    }

    /**
     * Show edit page by id.
     *
     * @param  $id
     * @param  CategoryRepo $categoryRepo
     * @return Application|Factory|View
     */
    public function edit($id, CategoryRepo $categoryRepo)
    {
        $article = $this->repo->findById($id);
        $categories = $categoryRepo->getActiveCategories();

        return view('Article::edit', compact(['article', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show success message with redirect.
     *
     * @param  string $title
     * @return RedirectResponse
     */
    private function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('articles.index');
    }
}
