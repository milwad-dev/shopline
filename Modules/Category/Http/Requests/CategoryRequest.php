<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Category\Enums\CategoryStatusEnum;

class CategoryRequest extends FormRequest
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
        $rules = [
            'parent_id'   => 'nullable|exists:categories,id',
            'title'       => 'required|string|min:3|max:255|unique:categories,title',
            'keywords'    => 'nullable|string|min:3|max:255',
            'status'      => ['required', 'string', new Enum(CategoryStatusEnum::class)],
            'description' => 'nullable|string|min:3',
        ];

        if (request()->method === 'PATCH') {
            $rules['title'] = 'required|string|min:3|max:255|unique:categories,title,'.request()->id;
        }

        return $rules;
    }
}
