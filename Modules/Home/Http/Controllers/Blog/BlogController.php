<?php

namespace Modules\Home\Http\Controllers\Blog;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\Home\Repositories\Blog\BlogRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Blog index page.
     *
     * @param BlogRepoEloquentInterface $blogRepoEloquent
     *
     * @return Application|Factory|View
     */
    public function index(BlogRepoEloquentInterface $blogRepoEloquent)
    {
        $articles = $blogRepoEloquent->getLatestArticles();
        $randomArticles = $blogRepoEloquent->getRandomArticles();
        $categories = $blogRepoEloquent->getArticlesWithCount();

        return view('Home::Pages.blog.index', compact(['articles', 'randomArticles', 'categories']));
    }

    /**
     * Blog details page.
     *
     * @param                           $slug
     * @param BlogRepoEloquentInterface $blogRepoEloquent
     *
     * @return Application|Factory|View
     */
    public function details($slug, BlogRepoEloquentInterface $blogRepoEloquent)
    {
        $article = $blogRepoEloquent->findArticleBySlug($slug);
        $randomArticles = $blogRepoEloquent->getRandomArticles($article->id);
        $categories = $blogRepoEloquent->getArticlesWithCount();

        return view('Home::Pages.blog.details', compact(['article', 'randomArticles', 'categories']));
    }
}
