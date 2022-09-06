<?php

namespace Modules\Product\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Milwad\LaravelAttributes\Traits\Attributable;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\User\Models\User;
use Spatie\Tags\HasTags;

class Product extends Model implements Viewable
{
    use HasFactory, Attributable, HasTags, InteractsWithViews;

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
        'is_popular',
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

    /**
     * Check category id is in categories product.
     *
     * @param  int $categoryId
     * @return mixed
     */
    public function checkSelectedCategoryies(int $categoryId)
    {
        return $this->categories->contains($categoryId);
    }

    /**
     * Boot product model.
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(static function($product) {
            $product->categories()->delete();
            $product->tags()->delete();
            $product->galleries()->delet();
            $product->attributes()->deleteAllAttribute();
        });
    }

    /**
     * Get product path.
     *
     * @return string
     */
    public function path()
    {
        return ''; // TODO
    }

    /**
     * Get rate score.
     *
     * @return string
     */
    public function getRate()
    {
        return ''; // TODO
    }

    /**
     * Scope active status.
     */
    public function scopeActive($query)
    {
        return $query->where('status', ProductStatusEnum::STATUS_ACTIVE->value);
    }

    /**
     * Add product to wishlist.
     *
     * @return string
     */
    public function addWishlist()
    {
        return '';
    }

    /**
     * Get product price.
     *
     * @return string
     */
    public function getPrice()
    {
        return number_format($this->price);
    }

    /**
     * Get product sku.
     *
     * @return string
     */
    public function getSku()
    {
        return "#$this->sku";
    }

    /**
     * Scope product popular.
     *
     * @param  $query
     * @return mixed
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', 1);
    }
}
