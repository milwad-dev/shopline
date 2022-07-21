<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\RegisterService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class RegisterController extends Controller
{
    public function view()
    {
        return view('Auth::register');
    }

    public function register(RegisterRequest $request, RegisterService $registerService)
    {
        $user = $registerService->storeUser($request); // Make user

        auth()->login($user); // Login User
        event(new Registered($user)); // Fire event

        ShareService::successToast('You register successfully');
        return to_route('home.index');
    }
}
