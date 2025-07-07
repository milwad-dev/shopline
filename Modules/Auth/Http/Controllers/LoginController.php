<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class LoginController extends Controller
{
    /**
     * Show login page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view()
    {
        return view('Auth::login');
    }

    /**
     * Login user by request.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $field = $request->has('phone') ? 'phone' : 'email';

        if (Auth::attempt([$field => $request->email, 'password' => $request->password])) {
            ShareService::successToast('Login successfully');

            return to_route('home.index');
        }

        ShareService::errorToast('Login unsuccessfully');

        return back();
    }
}
