<?php

namespace Modules\Contact\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Contact\Database\Factories\ContactFactory;

class Contact extends Model
{
    use HasFactory;

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'is_read'];

    /**
     * Create a new factory instance for the model.
     *
     * @return ContactFactory
     */
    protected static function newFactory()
    {
        return ContactFactory::new();
    }

    // Scopes

    /**
     * Scope is_read is true.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', 1);
    }

    /**
     * Scope is_read is false.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeNotRead($query)
    {
        return $query->where('is_read', 0);
    }

    // Methods

    /**
     * Get created_at.
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return \Carbon\Carbon::make($this->created_at)->format('Y-m-d');
    }
}
