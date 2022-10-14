<?php

namespace Modules\Comment\Repositories;

use Modules\Comment\Enums\CommentStatusEnum;
use Modules\Comment\Models\Comment;

class CommentRepoEloquent implements CommentRepoEloquentInterface
{
    /**
     * Get latest comments.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatest()
    {
        return $this->query()->latest();
    }

    /**
     * Find comment by id.
     *
     * @param  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Get active comment by id.
     *
     * @param  $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findActiveCommentById($id)
    {
        return $this->query()
            ->where('id' , $id)
            ->where('status' , CommentStatusEnum::STATUS_ACTIVE->value)
            ->first();
    }

    /**
     * Get query model(builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Comment::query();
    }
}
