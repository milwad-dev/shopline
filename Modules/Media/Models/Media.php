<?php

namespace Modules\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Services\MediaFileService;

class Media extends Model
{
    protected $table = 'medias';

    protected $casts = ['files' => 'json'];

    protected static function booted()
    {
        static::deleting(static function ($media) {
            MediaFileService::delete($media);
        });
    }

    /**
     * Get thumb media.
     */
    public function getThumbAttribute()
    {
        return MediaFileService::thumb($this);
    }

    /**
     * Get original media.
     */
    public function getOriginalAttribute()
    {
        return MediaFileService::original($this);
    }
}
