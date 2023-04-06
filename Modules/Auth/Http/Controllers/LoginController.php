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
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $field = $this->filterEmail($email);

        if (Auth::attempt([$field => $email, 'password' => $request->password])) {
            ShareService::successToast('Login successfully');

            return to_route('home.index');
        }

        ShareService::errorToast('Login unsuccessfully');

        return back();
    }

    /**
     * Filter string to give email or phone for login.
     *
     * @param string $field
     *
     * @return string
     */
    private function filterEmail(string $field): string
    {
        return filter_var($field, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }
}
