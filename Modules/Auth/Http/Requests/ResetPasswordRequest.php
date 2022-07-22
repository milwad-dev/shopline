<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Milwad\LaravelValidate\Rules\ValidStrongPassword;

class ResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() === true;
    }

    public function rules()
    {
        return [
            'password' => ['required', new ValidStrongPassword(), 'confirmed'],
        ];
    }
}
