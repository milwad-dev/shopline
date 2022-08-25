<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\User\Models\User;

class Category extends Model
{
    use HasFactory;

    /**
     * Set fillable for columns.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'parent_id', 'title', 'slug', 'keywords', 'status', 'description'];

    // Attributes
    /**
     * Set parent attributes.
     *
     * @return string
     */
    public function getParentAttribute()
    {
        return (is_null($this->parent_id)) ? 'No parent' : $this->parent->title;
    }

    // Relations
    /**
     * Relation to user, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation to parent, parent is this class(Category).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    /**
     * Relation to categories(upside down).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    // Methods

    /**
     * Return css class for category status.
     *
     * @return string
     */
    public function getCssClassStatus()
    {
        if ($this->status === CategoryStatusEnum::STATUS_ACTIVE->value) {
            return 'success';
        }

        return 'warning';
    }

    /**
     * Get path for detail category.
     *
     * @return string
     */
    public function path()
    {
        return '';
    }
}
