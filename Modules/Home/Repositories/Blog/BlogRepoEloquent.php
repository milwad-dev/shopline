<?php

namespace Modules\Home\Repositories\Blog;

use Modules\Article\Models\Article;
use Modules\Category\Models\Category;

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
     * @param string|int|null $id
     *
     * @return mixed
     */
    public function getRandomArticles(string|int $id = null)
    {
        $query = Article::query()
            ->with(['media'])
            ->active()
            ->inRandomOrder()
            ->limit(4);

        if (!is_null($id)) {
            return $query->where('id', '!=', $id);
        }

        return $query->get();
    }

    /**
     * Get categories with article count.
     *
     * @return mixed
     */
    public function getArticlesWithCount()
    {
        return Category::query()
            ->active()
            ->withCount('articles')
            ->latest()
            ->limit(6)
            ->get();
    }

    /**
     * Find article by slug.
     *
     * @param $slug
     *
     * @return mixed
     */
    public function findArticleBySlug($slug)
    {
        return Article::query()
            ->with(['media', 'categories'])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();
    }
}
