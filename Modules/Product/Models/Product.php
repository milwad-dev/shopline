<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Milwad\LaravelAttributes\Traits\Attributable;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\User\Models\User;

class Product extends Model
{
    use HasFactory, Attributable;

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

    // Relations
    /**
     * Relation to User model, one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
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
        return $this->belongsToMany(Category::class);
    }
}
