<?php

namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Models\Media;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\User\Models\User;

class Slider extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'media_id', 'link', 'status'];

    // Relations
    /**
     * Relations to User model, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relations to Media model, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    // Methods
    /**
     * Set css status class.
     *
     * @return string
     */
    public function cssStatus()
    {
        if ($this->status === SliderStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }

        return 'warning';
    }
}
