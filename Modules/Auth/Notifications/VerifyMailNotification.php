<?php

namespace Modules\Auth\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Auth\Mail\VerifyCodeMail;
use Modules\Auth\Services\VerifyService;

class VerifyMailNotification extends Notification
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
     * Send to mail.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function toMail($notifiable)
    {
        $code = VerifyService::generate();
        VerifyService::store($notifiable->id, $code, now()->addDay());

        return (new VerifyCodeMail($code))->to($notifiable->email);
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
