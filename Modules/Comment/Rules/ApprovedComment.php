<?php

namespace Modules\Comment\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Comment\Repositories\CommentRepoEloquent;

class ApprovedComment implements Rule
{
    public function __construct()
    {
        //
    }

    /**
     * Check rule.
     *
     * @param $attribute
     * @param $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !is_null(resolve(CommentRepoEloquent::class)->findActiveCommentById($value));
    }

    /**
     * Error message.
     *
     * @return string
     */
    public function message()
    {
        return 'There is a Problem.';
    }
}
