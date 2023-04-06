<?php

namespace Modules\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public string $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build()
    {
        return $this
            ->markdown('Auth::Mails.reset-password-verify-code')
            ->subject('Reset password | '.config('app.name'));
    }
}
