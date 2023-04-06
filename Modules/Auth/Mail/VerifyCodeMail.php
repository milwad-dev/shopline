<?php

namespace Modules\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyCodeMail extends Mailable
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
            ->markdown('Auth::Mails.verify-mail')
            ->subject('Verify account | '.config('app.name'));
    }
}
