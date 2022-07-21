<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Requests\ResetPasswordVerifyCodeRequest;
use Modules\Auth\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Modules\Auth\Jobs\SendResetPasswordMailJob;
use Modules\Auth\Services\VerifyService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;
use Modules\User\Repositories\UserRepo;

class ForgotPasswordController extends Controller
{
    public function showVerifyCodeRequestForm()
    {
        return view('Auth::passwords.email');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request, UserRepo $userRepo)
    {
        $user = $userRepo->findByEmail($request->email);

        if ($user && ! VerifyService::has($user->id)) SendResetPasswordMailJob::dispatch($user);

        return view('Auth::passwords.enter-verify-code');
    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if ($user == null || ! VerifyService::check($user->id, $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'code is invalid!']);
        }

        auth()->loginUsingId($user->id);

        ShareService::successToast('Password reset successfully');
        return to_route('password.showResetForm');
    }
}
