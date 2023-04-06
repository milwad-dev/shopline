<?php

namespace Modules\Share\Responses;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxResponses
{
    /**
     * Return json response with status 200 (success).
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    public static function SuccessResponse(string $message = 'The operation was successful.')
    {
        return response()->json(['message' => $message]);
    }

    /**
     * Return json response with status 500 (serve error).
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    public static function FailedResponse(string $message = 'The operation was not successful.')
    {
        return response()->json(['message' => $message], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
