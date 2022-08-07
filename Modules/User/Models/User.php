<?php

namespace Modules\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Auth\Notifications\ResetPasswordRequestNotification;
use Modules\Auth\Notifications\VerifyMailNotification;
use Modules\Category\Models\Category;
use Modules\User\Enums\UserTypeEnum;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * Set fillable for columns.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'phone', 'type', 'password'];

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
     * Override verify mail notification
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMailNotification());
    }

    /**
     * Override reset password notification.
     *
     * @return void
     */
    public function sendResetPasswordRequestNotification()
    {
        $this->notify(new ResetPasswordRequestNotification());
    }

    // Methods
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

    // Relations
    /**
     * Relations to Category model, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Relations to Product model, relation is one to many.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Category::class);
    }
}
