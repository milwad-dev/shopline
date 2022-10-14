<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Enums\CommentStatusEnum;
use Modules\User\Models\User;

class Comment extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'comment_id', 'commentable_id', 'commentable_type', 'body', 'status'];

    /**
     * With relations.
     *
     * @var string[]
     */
    protected $with = ['user', 'comments'];

    # Relations

    /**
     * Relation morph-to commentable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Relation to User model, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation to Comment model, one to one - parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(__CLASS__);
    }

    /**
     * Relation to Comment model, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(__CLASS__); // for reply
    }

    # Methods

    /**
     * Get status css.
     *
     * @return string
     */
    public function getStatusCss()
    {
        if ($this->status === CommentStatusEnum::STATUS_ACTIVE->value) {
            return 'text-success';
        }
        if ($this->status === CommentStatusEnum::STATUS_NEW->value) {
            return 'text-warning';
        }

        return 'text-danger';
    }
}
