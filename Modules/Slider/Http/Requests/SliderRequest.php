<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Slider\Enums\SliderStatusEnum;

class SliderRequest extends FormRequest
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
            'image'         => 'required|file|mimes:jpg,png,jpeg|max:1048',
            'link'          => 'required|string|min:3|max:255',
            'title'         => 'required|string|min:3|max:255',
            'title_color'   => 'required',
            'status'        => ['required', 'string', 'max:255', new Enum(SliderStatusEnum::class)],
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = 'nullable|file|mimes:jpg,png,jpeg|max:1048';
        }

        return $rules;
    }
}
