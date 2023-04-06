<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Validation login.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'    => 'required|min:3|max:190',
            'password' => 'required|min:6|max:190',
        ];
    }
}
