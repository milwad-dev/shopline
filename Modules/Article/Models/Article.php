<?php

namespace Modules\Article\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Article\Enums\ArticleStatusEnum;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\User\Models\User;
use Spatie\Tags\HasTags;

class Article extends Model
{
    use HasFactory, HasTags;

    /**
     * Add columns to fillable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'media_id', 'title', 'slug', 'min_read', 'body', 'keywords', 'description', 'status'];

    /**
     * With relations.
     *
     * @var string[]
     */
    protected $with = ['user'];

    // Relations
    /**
     * Relation to user, relation is one to many.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation to media, relation is one to many.
     *
     * @return BelongsTo
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    /**
     * Relation to Category model, many to many.
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category');
    }

    // Methods
    /**
     * Return css class for category status.
     *
     * @return string
     */
    public function getCssClassStatus()
    {
        if ($this->status === ArticleStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }

        if ($this->status === ArticleStatusEnum::STATUS_IN_PROGRESS->value) {
            return 'primary';
        }

        return 'warning';
    }

    /**
     * Boot article model.
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(static function($article) {
            $article->categories()->delete();
            $article->tags()->delete();
        });
    }
}
