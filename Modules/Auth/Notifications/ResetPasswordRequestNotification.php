<?php

namespace Modules\Auth\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Auth\Mail\ResetPasswordRequestMail;
use Modules\Auth\Services\VerifyService;

class ResetPasswordRequestNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    /**
     * Send via (email).
     *
     * @param $notifiable
     *
     * @return string[]
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Send reset password code notification for email.
     *
     * @param $notifiable
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return ResetPasswordRequestMail
     */
    public function toMail($notifiable)
    {
        $code = VerifyService::generate();
        VerifyService::store($notifiable->id, $code, 120);

        return (new ResetPasswordRequestMail($code))->to($notifiable->email);
    }

    /**
     * Save into database.
     *
     * @param $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
