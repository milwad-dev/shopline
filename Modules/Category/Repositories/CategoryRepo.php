<?php

namespace Modules\Category\Repositories;

use Modules\Category\Models\Category;

class CategoryRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    private function query()
    {
        return Category::query();
    }
}
