<?php

namespace Modules\Product\Models;

use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Milwad\LaravelAttributes\Traits\Attributable;
use Modules\Category\Models\Category;
use Modules\Comment\Traits\Commentable;
use Modules\Media\Models\Media;
use Modules\Product\Database\Factories\ProductFactory;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\User\Models\User;
use Spatie\Tags\HasTags;

class Product extends Model implements Viewable
{
    use HasFactory;
    use Attributable;
    use HasTags;
    use InteractsWithViews;
    use Commentable;

    /**
     * Set column in fillable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id',
        'first_media_id',
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

    /**
     * Create a new factory instance for the model.
     *
     * @return ProductFactory
     */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

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

    /**
     * Relation to product_rates table, one to many.
     *
     * @return BelongsToMany
     */
    public function rates()
    {
        return $this->belongsToMany(User::class, 'product_rates');
    }

    // Booted
    /**
     * Boot product model.
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(static function ($product) {
            $product->categories()->delete();
            $product->tags()->delete();
            $product->galleries()->delet();
            $product->attributes()->deleteAllAttribute();
        });
    }

    // Scopes
    /**
     * Scope product popular.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', 1);
    }

    /**
     * Scope active status.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', ProductStatusEnum::STATUS_ACTIVE->value);
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
     * @param int $categoryId
     *
     * @return mixed
     */
    public function checkSelectedCategoryies(int $categoryId)
    {
        return $this->categories->contains($categoryId);
    }

    /**
     * Get product path.
     *
     * @return string
     */
    public function path()
    {
        return route('products.details', [
            'sku'  => $this->sku,
            'slug' => $this->slug,
        ]);
    }

    /**
     * Get cart path.
     *
     * @return string
     */
    public function cartPath()
    {
        return route('cart.add', $this->id);
    }

    /**
     * Get rate score.
     *
     * @return int
     */
    public function getRate()
    {
        $totalRate = $this->rates()->get()->sum('rates');
        $totalRateCount = $this->rates()->count();
        $calculateRate = (int) $totalRate / $totalRateCount;

        return (int) round((int) $calculateRate);
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
     * Get created at by format.
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return Carbon::make($this->created_at)->format('Y, m D');
    }
}
