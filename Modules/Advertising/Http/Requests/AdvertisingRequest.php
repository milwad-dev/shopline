<?php

namespace Modules\Advertising\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Advertising\Enums\AdvertisingLocationEnum;
use Modules\Advertising\Enums\AdvertisingStatusEnum;

class AdvertisingRequest extends FormRequest
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
        $rules = [
            'image'     => ['required', 'file', 'mimes:jpeg,png,jpeg', 'max:2048'],
            'link'      => ['nullable', 'string', 'min:3', 'max:255'],
            'title'     => ['nullable', 'string', 'min:3', 'max:255'],
            'location'  => ['required', 'string', 'max:255', new Enum(AdvertisingLocationEnum::class)],
            'status'    => ['required', 'string', 'max:255', new Enum(AdvertisingStatusEnum::class)],
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = ['nullable', 'file', 'mimes:jpeg,png,jpeg', 'max:2048'];
        }

        return $rules;
    }
}
