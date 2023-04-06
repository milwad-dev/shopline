<?php

namespace Modules\RolePermission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $ruleName = 'required|min:3|max:255|unique:roles,name';

        $rules = [
            'name'        => $ruleName,
            'permissions' => 'required|array|min:1',
        ];

        if (request()->method === 'PATCH') {
            $rules['id'] = 'required|exists:roles,id';
            $rules['name'] = "$ruleName,".request()->id;
            $rules['permissions'] = 'nullable|array|min:1';
        }

        return $rules;
    }
}
