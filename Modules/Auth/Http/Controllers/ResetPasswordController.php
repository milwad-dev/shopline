<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Requests\ResetPasswordRequest;
use Modules\Auth\Services\ResetPasswordService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class ResetPasswordController extends Controller
{
    public function view()
    {
        return view('Auth::passwords.reset');
    }

    public function reset(ResetPasswordRequest $request)
    {
        ResetPasswordService::changePassword(auth()->user(), $request->password);

        ShareService::successToast('Your password changed successfully');
        return to_route('home.index');
    }
}
