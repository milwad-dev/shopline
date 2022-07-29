<?php

namespace Modules\Category\Services;

use Modules\Category\Models\Category;
use Modules\Share\Services\ShareService;

class CategoryService
{
    public function store($request)
    {
        return $this->query()->create([
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => ShareService::makeSlug($request->title),
            'keywords' => $request->keywords,
            'status' => $request->status,
            'description' => $request->description,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => ShareService::makeSlug($request->title),
            'keywords' => $request->keywords,
            'status' => $request->status,
            'description' => $request->description,
        ]);
    }

    private function query()
    {
        return Category::query();
    }
}
