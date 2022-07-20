<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && is_null(auth()->user()->email_verified_at)) {
            return to_route('verification.notice');
        }

        return $next($request);
    }
}
