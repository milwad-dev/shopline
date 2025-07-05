<?php

namespace Modules\Category\Services;

use Modules\Category\Models\Category;
use Modules\Share\Services\ShareService;

class CategoryService implements CategoryServiceInterface
{
    /**
     * Store category.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store($request)
    {
        return Category::query()->create([
            'user_id' => auth()->id(),
            'media_id' => $request->media_id,
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => ShareService::makeSlug($request->title),
            'keywords' => $request->keywords,
            'status' => $request->status,
            'description' => $request->description,
        ]);
    }

    /**
     * Update category by id.
     *
     *
     * @return bool
     */
    public function update($request, Category $category)
    {
        return $category->update([
            'media_id' => $request->media_id,
            'parent_id' => $request->parent_id,
            'title' => $request->title,
            'slug' => ShareService::makeSlug($request->title),
            'keywords' => $request->keywords,
            'status' => $request->status,
            'description' => $request->description,
        ]);
    }
}
