<?php

namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'media_id', 'link', 'status'];
}
