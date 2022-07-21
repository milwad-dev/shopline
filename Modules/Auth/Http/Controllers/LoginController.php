<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class LoginController extends Controller
{
    public function view()
    {
        return view('Auth::login');
    }

    public function login(LoginRequest $request)
    {
        $field = $this->filterEmail($request);

        if (Auth::attempt(['email' => $field, 'password' => $request->password])) {
            ShareService::successToast('Login successfully');
            return to_route('home.index');
        }

        ShareService::errorToast('Login unsuccessfully');
        return back();
    }

    private function filterEmail(LoginRequest $request): string
    {
        $username = $request->get($this->email);
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }
}
