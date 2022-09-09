<?php

namespace Modules\Comment\Services;

use Modules\Comment\Models\Comment;

class CommentService
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
        return Comment::query();
    }
}
        