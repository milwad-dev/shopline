<?php

namespace Modules\Category\Services;

use Modules\Category\Models\Category;

class CategoryService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([

        ]);
    }

    private function query()
    {
        return Category::query();
    }
}
