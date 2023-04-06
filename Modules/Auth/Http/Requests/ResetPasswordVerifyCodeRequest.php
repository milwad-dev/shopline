<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Services\VerifyService;

class ResetPasswordVerifyCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'verify_code' => VerifyService::getRule(),
            'email'       => 'required|email',
        ];
    }
}
