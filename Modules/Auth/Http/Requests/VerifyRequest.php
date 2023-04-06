<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Services\VerifyService;

class VerifyRequest extends FormRequest
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
     * Validate code verify.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'verify_code' => VerifyService::getRule(),
        ];
    }
}
