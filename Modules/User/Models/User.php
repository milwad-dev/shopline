<?php

namespace Modules\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Advertising\Models\Advertising;
use Modules\Article\Models\Article;
use Modules\Auth\Notifications\ResetPasswordRequestNotification;
use Modules\Auth\Notifications\VerifyMailNotification;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\Slider\Models\Slider;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserTypeEnum;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * Set fillable for columns.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'phone', 'type', 'password', 'avatar_id'];

    /**
     * Set column to hidden for columns.
     *
     * @var string[]
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Cast columns.
     *
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => UserTypeEnum::class,
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return UserFactory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    // Methods

    /**
     * Override verify mail notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMailNotification);
    }

    /**
     * Override reset password notification.
     *
     * @return void
     */
    public function sendResetPasswordRequestNotification()
    {
        $this->notify(new ResetPasswordRequestNotification);
    }

    /*
     * Get text email verified at.
     */
    public function getStatusEmailVerifiedAtText()
    {
        if ($this->email_verified_at) {
            return 'Verified';
        }

        return 'Not confirmed';
    }

    /**
     * Get css class for email verified at user.
     */
    public function getCssClassStatusEmailVerifiedAt()
    {
        if ($this->email_verified_at) {
            return 'success';
        }

        return 'warning';
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function path()
    {
        return '';
    }

    /**
     * Get the user avatar.
     */
    public function getAvatar(): string
    {
        return $this->avatar ? $this->avatar->media : asset(config('app.logo'));
    }

    // Relations
    /**
     * Relations to Category model, relation is one to many.
     *
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Relations to Product model, relation is one to many.
     *
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Relations to Article model, relation is one to many.
     *
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Relations to Slider model, relation is one to many.
     *
     * @return HasMany
     */
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    /**
     * Relations to Advertising model, relation is one to many.
     *
     * @return HasMany
     */
    public function advertisings()
    {
        return $this->hasMany(Advertising::class);
    }

    /**
     * Relations to UserAdress model, relation is one-to-many.
     *
     * @return HasMany
     */
    public function address()
    {
        return $this->hasMany(UserAdress::class);
    }

    /**
     * Relation to Media model, relation is one-to-many.
     */
    public function avatar(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'avatar_id');
    }
}
