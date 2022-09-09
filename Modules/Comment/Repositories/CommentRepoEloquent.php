<?php

namespace Modules\Comment\Repositories;

use Modules\Comment\Models\Comment;

class CommentRepoEloquent implements CommentRepoEloquentInterface
{
    public function getLatest()
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
        return Comment::query();
    }
}
