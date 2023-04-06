<?php

namespace Modules\Comment\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommentableRule implements Rule
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
        return class_exists($value) && method_exists($value, 'comments');
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
