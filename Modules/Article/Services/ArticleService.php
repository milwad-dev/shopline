<?php

namespace Modules\Article\Services;

use Modules\Article\Models\Article;

class ArticleService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    private function query()
    {
        return Article::query();
    }
}
        