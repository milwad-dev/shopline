<?php

namespace Modules\Category\Repositories;

use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;

class CategoryRepoEloquent implements CategoryRepoEloquentInterface
{
    public function getLatestCategories()
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

    public function changeStatus($id, string $status)
    {
        return $this->query()->where('id', $id)->update(['status' => $status]);
    }

    public function getActiveCategories()
    {
        return $this->query()->where('status', CategoryStatusEnum::STATUS_ACTIVE->value);
    }

    private function query()
    {
        return Category::query();
    }
}
