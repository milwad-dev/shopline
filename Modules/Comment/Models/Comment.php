<?php

namespace Modules\Comment\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Comment\Database\Factories\CommentFactory;
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

    /**
     * Create a new factory instance for the model.
     *
     * @return CommentFactory
     */
    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    // Attributes

    /**
     * Set comment_id (reply) attributes.
     *
     * @return string
     */
    public function getReplyAttribute()
    {
        return (is_null($this->comment_id)) ? 'No reply' : $this->comment->title;
    }

    // Relations

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

    // Methods

    /**
     * Get status css.
     *
     * @return string
     */
    public function getCssClassStatus()
    {
        if ($this->status === CommentStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }
        if ($this->status === CommentStatusEnum::STATUS_NEW->value) {
            return 'warning';
        }

        return 'danger';
    }

    /**
     * Get created_at.
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return Carbon::make($this->created_at)->format('Y-m-d');
    }
}
