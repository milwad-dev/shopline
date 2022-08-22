<?php

namespace Modules\Article\Repositories;

use Modules\Article\Models\Article;

class ArticleRepoEloquent implements ArticleRepoEloquentInterface
{
    /**
     * Get latest articles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatestArticles()
    {
        return $this->query()->latest();
    }

    /**
     * Find article by id.
     *
     * @param  $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Delete article by id.
     *
     * @param  $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    /**
     * Get builder query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Article::query();
    }
}
