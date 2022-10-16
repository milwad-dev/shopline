<?php

namespace Modules\Contact\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'phone', 'sujbect', 'message', 'is_read'];

    # Scopes

    /**
     * Scope is_read is true.
     *
     * @param  $query
     * @return mixed
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', 1);
    }

    /**
     * Scope is_read is false.
     *
     * @param  $query
     * @return mixed
     */
    public function scopeNotRead($query)
    {
        return $query->where('is_read', 0);
    }
}
