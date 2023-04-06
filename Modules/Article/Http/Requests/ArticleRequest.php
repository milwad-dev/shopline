<?php

namespace Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Article\Enums\ArticleStatusEnum;

class ArticleRequest extends FormRequest
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
            'image'       => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'body'        => ['required', 'string', 'min:3'],
            'title'       => ['required', 'string', 'min:3', 'max:255', 'unique:articles,title'],
            'categories'  => ['required', 'array'],
            'status'      => ['required', 'string', new Enum(ArticleStatusEnum::class)],
            'keywords'    => ['nullable', 'string', 'min:3', 'max:255'],
            'description' => ['nullable', 'string', 'min:3', 'max:1000'],
        ];

        if (request()->method === 'PATCH') {
            $rules['image'] = ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'];
            $rules['title'] = ['required', 'string', 'min:3', 'max:255', 'unique:articles,title,'.request()->id];
        }

        return $rules;
    }
}
