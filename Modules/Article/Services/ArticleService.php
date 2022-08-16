<?php

namespace Modules\Article\Services;

use Modules\Article\Models\Article;
use Modules\Share\Services\ShareService;

class ArticleService
{
    public function store($request)
    {
        $title = $request->title;
        $body = $request->body;

        return $this->query()->create([
            'user_id' => auth()->id(),
            'media_id' => $request->media_id,
            'title' => $title,
            'slug' => ShareService::makeSlug($title),
            'min_read' => ShareService::convertTextToReadMinute($body),
            'body' => $body,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }

    public function update($request, $id)
    {
        $title = $request->title;
        $body = $request->body;

        return $this->query()->whereId($id)->update([
            'media_id' => $request->media_id,
            'title' => $title,
            'slug' => ShareService::makeSlug($title),
            'min_read' => ShareService::convertTextToReadMinute($body),
            'body' => $body,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }

    private function query()
    {
        return Article::query();
    }
}