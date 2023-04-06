<?php

namespace Modules\Comment\Traits;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Modules\Comment\Enums\CommentStatusEnum;
use Modules\Comment\Models\Comment;

trait Commentable
{
    use HasRelationships;

    /**
     * Relation morph-to-many Comment(model).
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get active comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activeComments()
    {
        return $this->comments() // Recursive
            ->where('status', CommentStatusEnum::STATUS_ACTIVE->value)
            ->whereNull('comment_id')
            ->with('comments');
    }
}
