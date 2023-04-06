<?php

namespace Modules\Home\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Comment\Rules\ApprovedComment;
use Modules\Comment\Rules\CommentableRule;

class CommentRequest extends FormRequest
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
     * Rules.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment_id'       => ['nullable', new ApprovedComment()],
            'body'             => 'required|string|min:3|max:500',
            'commentable_id'   => 'required|string',
            'commentable_type' => ['required', new CommentableRule()],
        ];
    }
}
