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
     * @param  BlogRepoEloquentInterface $blogRepoEloquent
     * @return Application|Factory|View
     */
    public function index(BlogRepoEloquentInterface $blogRepoEloquent)
    {
        $articles = $blogRepoEloquent->getLatestArticles();

        return view('Home::Pages.blog.index', compact(['articles']));
    }
}
