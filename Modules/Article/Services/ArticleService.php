<?php

namespace Modules\Article\Services;

use Modules\Article\Models\Article;
use Modules\Share\Services\ShareService;

class ArticleService implements ArticleServiceInterface
{
    /**
     * Store article by request.
     *
     * @param  $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store($request)
    {
        $title = $request->title;
        $body = $request->body;

        return $this->query()->create([
            'user_id'       => auth()->id(),
            'media_id'      => $request->media_id,
            'title'         => $title,
            'slug'          => ShareService::makeSlug($title),
            'min_read'      => ShareService::convertTextToReadMinute($body),
            'body'          => $body,
            'keywords'      => $request->keywords,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);
    }

    /**
     * Update article by id & request.
     *
     * @param  $request
     * @param  $id
     * @return mixed
     */
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

    /**
     * Change status article by id.
     *
     * @param  $id
     * @param  string $status
     * @return int
     */
    public function changeStatus($id, string $status)
    {
        return $this->query()->where('id', $id)->update(['status' => $status]);
    }

    /**
     * Get query for article model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Article::query();
    }
}
