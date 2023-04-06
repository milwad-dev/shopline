<?php

namespace Modules\Home\Services\Comment;

use Modules\Comment\Enums\CommentStatusEnum;
use Modules\Comment\Models\Comment;
use Modules\RolePermission\Models\Permission;

class CommentService
{
    /**
     * Store comment by data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
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

    /**
     * Get query model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Comment::query();
    }

    /**
     * Get status comment by user permission.
     *
     * @return string
     */
    private function getStatusByUserPermission(): string
    {
        return auth()->user()->can(Permission::PERMISSION_COMMENTS)
            ? CommentStatusEnum::STATUS_ACTIVE->value
            : CommentStatusEnum::STATUS_NEW->value;
    }

    /**
     * Check comment_id is exists.
     *
     * @param array $data
     *
     * @return mixed
     */
    private function getCommentId(array $data): mixed
    {
        return array_key_exists('comment_id', $data) ? $data['comment_id'] : null;
    }
}
