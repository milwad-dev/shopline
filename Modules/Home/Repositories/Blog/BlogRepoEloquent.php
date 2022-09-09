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
}
