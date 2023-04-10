<?php

namespace Modules\Advertising\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Advertising\Database\Factories\AdvertisingFactory;
use Modules\Advertising\Enums\AdvertisingStatusEnum;
use Modules\Media\Models\Media;
use Modules\User\Models\User;

class Advertising extends Model
{
    use HasFactory;

    /**
     * Set fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'media_id', 'link', 'title', 'location', 'status'];

    /**
     * Create a new factory instance for the model.
     *
     * @return AdvertisingFactory
     */
    protected static function newFactory()
    {
        return AdvertisingFactory::new();
    }

    // Relations

    /**
     * Relations to User model, relation is one to many.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relations to Media model, relation is one to many.
     *
     * @return BelongsTo
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    // Methods

    /**
     * Get css class for status.
     *
     * @return string
     */
    public function getCssClassStatus()
    {
        if ($this->status === AdvertisingStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }

        return 'warning';
    }

    /**
     * Get link.
     *
     * @return string
     */
    public function getLink()
    {
        $link = $this->link;

        if (!is_null($link) && !startWith($link, 'https')) {
            return "https://$link";
        }

        return $link;
    }

    // Scopes

    /**
     * Get active scope.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', AdvertisingStatusEnum::STATUS_ACTIVE->value);
    }
}
