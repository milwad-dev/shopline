<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;
use Milwad\LaravelValidate\Rules\ValidStrongPassword;
use Modules\User\Enums\UserTypeEnum;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() === true;
    }

    /**
     * Validation for store & update users.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name'              => ['required', 'string', 'min:3', 'max:190'],
            'email'             => ['required', 'email', 'min:3', 'max:190', 'unique:users,email'],
            'phone'             => ['required', 'numeric', 'digits:11', 'unique:users,phone', new ValidPhoneNumber()],
            'type'              => ['required', 'string', new Enum(UserTypeEnum::class)],
            'password'          => ['required', 'string', 'min:8', 'max:150', new ValidStrongPassword()],
            'email_verified_at' => 'nullable',
        ];

        // Add id for some rules for update users
        if (request()->method === 'PATCH') {
            $rules['email'] = ['required', 'email', 'min:3', 'max:190', 'unique:users,email,'.request()->id];
            $rules['phone'] = ['required', 'numeric', 'digits:11', 'unique:users,phone,'.request()->id, new ValidPhoneNumber()];
            $rules['password'] = ['nullable', 'string', 'min:8', 'max:150', new ValidStrongPassword()];
        }

        return $rules;
    }
}
