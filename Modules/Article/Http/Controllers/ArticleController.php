<?php

namespace Modules\Article\Http\Controllers;

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
     * Display the specified resource.
     *
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Article\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
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
