<?php

namespace Modules\Home\Repositories\Blog;

use Modules\Article\Models\Article;

class BlogRepoEloquent implements BlogRepoEloquentInterface
{
    /**
     * Get latest articles.
     *
     * @return mixed
     */
    public function getLatestArticles()
    {
        return Article::query()
            ->with(['media'])
            ->active()
            ->latest()
            ->paginate(15);
    }

    /**
     * Get random articles.
     *
     * @return mixed
     */
    public function getRandomArticles()
    {
        return Article::query()
            ->with(['media'])
            ->active()
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
}
