<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Modules\User\Enums\UserTypeEnum;

class RegisterRequest extends FormRequest
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
     * Rules of register.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'min:3', 'max:150'],
            'email'     => ['required', 'email', 'min:3', 'max:150', 'unique:users,email'],
            'phone'     => ['required', 'numeric', 'digits:11', 'unique:users,phone', new ValidPhoneNumber()],
            'type'      => ['required', 'string', new Enum(UserTypeEnum::class)],
            'policy'    => ['required'],
            'password'  => ['required', 'string', 'min:8', 'max:150', new ValidStrongPassword()],
        ];
    }
}
