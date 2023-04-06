<?php

namespace Modules\Payment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Discount\Models\Discount;
use Modules\User\Models\User;

class Payment extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'buyer_id',
        'seller_id',
        'paymentable_id',
        'paymentable_type',
        'amount',
        'invoice_id',
        'gateway',
        'seller_share',
        'site_share',
        'seller_p',
        'status',
    ];

    // Relations

    /**
     * Relation polymorphic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function paymentable()
    {
        return $this->morphTo();
    }

    /**
     * Relations to Discount model, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_payment')->withTimestamps();
    }

    /**
     * Relations to User model, relation is one to many.
     *
     * @return BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    /**
     * Relations to User model, relation is one to many.
     *
     * @return BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
