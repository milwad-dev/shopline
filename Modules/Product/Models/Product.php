<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Milwad\LaravelAttributes\Traits\Attributable;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\User\Models\User;
use Spatie\Tags\HasTags;

class Product extends Model
{
    use HasFactory, Attributable, HasTags;

    /**
     * Set column in fillable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id',
        'first_media_id',
        'second_media_id',
        'title',
        'slug',
        'sku',
        'price',
        'count',
        'type',
        'short_description',
        'body',
        'status',
    ];

    /**
     * With relations.
     *
     * @var string[]
     */
    protected $with = ['vendor'];

    // Relations
    /**
     * Relation to User model, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    /**
     * Relation to medias table, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function first_media()
    {
        return $this->belongsTo(Media::class, 'first_media_id');
    }

    /**
     * Relation to medias table, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function second_media()
    {
        return $this->belongsTo(Media::class, 'second_media_id');
    }

    /**
     * Relation to Category model, many to many.
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    /**
     * Relation to Media model, many to many.
     *
     * @return BelongsToMany
     */
    public function galleries()
    {
        return $this->belongsToMany(Media::class, 'product_gallery');
    }

    // Methods
    /**
     * Get css class for status.
     *
     * @return string
     */
    public function getCssClassStatus()
    {
        if ($this->status === ProductStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }

        if ($this->status === ProductStatusEnum::STATUS_IN_PROGRESS->value) {
            return 'warning';
        }

        return 'danger';
    }
}
