<?php

namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Http\Requests\ResetPasswordVerifyCodeRequest;
use Modules\Auth\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Modules\Auth\Jobs\SendResetPasswordMailJob;
use Modules\Auth\Services\VerifyService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;
use Modules\User\Repositories\UserRepoEloquent;

class ForgotPasswordController extends Controller
{
    /**
     * Show forgot password view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showVerifyCodeRequestForm()
    {
        return view('Auth::passwords.email');
    }

    /**
     * Send email to user.
     *
     * @param SendResetPasswordVerifyCodeRequest $request
     * @param UserRepoEloquent                   $userRepo
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request, UserRepoEloquent $userRepo)
    {
        $user = $userRepo->findByEmail($request->email);

        if ($user && !VerifyService::has($user->id)) {
            SendResetPasswordMailJob::dispatch($user);
        }

        return view('Auth::passwords.enter-verify-code');
    }

    /**
     * Check verify code.
     *
     * @param ResetPasswordVerifyCodeRequest $request
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepoEloquent::class)->findByEmail($request->email);
        if ($user == null || !VerifyService::check($user->id, $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'code is invalid!']);
        }

        auth()->loginUsingId($user->id);

        ShareService::successToast('Password reset successfully');

        return to_route('password.showResetForm');
    }
}
