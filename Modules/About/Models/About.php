<?php

namespace Modules\About\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\About\Database\Factories\AboutFactory;

class About extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['body'];

    /**
     * Create a new factory instance for the model.
     *
     * @return AboutFactory
     */
    protected static function newFactory()
    {
        return AboutFactory::new();
    }
}
