<?php

namespace Modules\Home\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Milwad\LaravelValidate\Rules\ValidPhoneNumber;

class ContactRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'    => 'required|string|min:3|max:250',
            'email'   => 'required|email|min:3|max:250',
            'phone'   => ['required', 'numeric', 'digits:11', new ValidPhoneNumber()],
            'subject' => 'required|string|min:3|max:250',
            'message' => 'required|string|min:3|max:800',
        ];
    }
}
