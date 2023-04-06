<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Requests\ResetPasswordRequest;
use Modules\Auth\Services\ResetPasswordService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class ResetPasswordController extends Controller
{
    /**
     * Show reset password view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view()
    {
        return view('Auth::passwords.reset');
    }

    /**
     * Reset password by request.
     *
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        ResetPasswordService::changePassword(auth()->user(), $request->password);

        ShareService::successToast('Your password changed successfully');

        return to_route('home.index');
    }
}
