<?php

namespace Modules\Discount\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Payment\Models\Payment;
use Modules\Product\Models\Product;

class Discount extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'code',
        'link',
        'description',
        'usage_limitation',
        'uses',
        'percent',
        'expire_at',
        'status',
        'type',
    ];

    /**
     * Cast column.
     *
     * @var string[]
     */
    protected $casts = ['expire_at' => 'datetime'];

    // Relations

    /**
     * Relation to Product model, one to many morph.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function products()
    {
        return $this->morphedByMany(Product::class, 'discountable');
    }

    /**
     * Relation to Payment model, many to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'discount_payments');
    }
}
