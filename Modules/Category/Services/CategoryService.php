<?php

namespace Modules\Category\Services;

use Modules\Category\Models\Category;
use Modules\Share\Repositories\ShareRepo;

class CategoryService
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
        return Category::class;
    }
}
        