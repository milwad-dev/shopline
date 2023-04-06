<?php

namespace Modules\Discount\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Discount\Enums\DiscountTypeEnum;

class DiscountRequest extends FormRequest
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
        return [
            'code'             => 'nullable|string|unique:discounts,code|min:3|max:250',
            'percent'          => 'required|numeric',
            'usage_limitation' => 'nullable|numeric',
            'expire_at'        => 'nullable',
            'link'             => 'nullable|string|min:3|max:250',
            'type'             => ['required', 'string', 'max:250', new Enum(DiscountTypeEnum::class)],
            'description'      => 'nullable|string|max:250',
        ];
    }
}
