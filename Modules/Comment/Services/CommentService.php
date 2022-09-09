<?php

namespace Modules\Comment\Services;

use Modules\Comment\Enums\CommentStatusEnum;
use Modules\Comment\Models\Comment;
use Modules\RolePermission\Models\Permission;

class CommentService
{
    public function store(array $data)
    {
        return $this->query()->create([
            'user_id'           => auth()->id(),
            'status'            => $this->getStatusByUserPermission(),
            'comment_id'        => $this->getCommentId($data),
            'body'              => $data['body'],
            'commentable_id'    => $data['commentable_id'],
            'commentable_type'  => $data['commentable_type'],
        ]);
    }

    private function query()
    {
        return Comment::query();
    }

    private function getStatusByUserPermission()
    {
        return auth()->user()->can(Permission::PERMISSION_COMMENTS)
            ? CommentStatusEnum::STATUS_ACTIVE->value
            : CommentStatusEnum::STATUS_NEW->value;
    }

    private function getCommentId(array $data): mixed
    {
        return array_key_exists("comment_id", $data) ? $data['comment_id'] : null;
    }
}
