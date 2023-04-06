<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\VerifyRequest;
use Modules\Auth\Jobs\SendMailVerificationJob;
use Modules\Auth\Services\VerifyService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Return view verify email.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function view(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect(route('home.index'))
            : view('Auth::verify');
    }

    /**
     * Verify user by check code.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function verify(VerifyRequest $request)
    {
        if (!VerifyService::check(auth()->id(), $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'The entered code is invalid!']);
        }

        auth()->user()->markEmailAsVerified();
        ShareService::successToast('Your account has been successfully verified.');

        return redirect()->route('home.index');
    }

    /**
     * Reset verify code.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect(route('home.index'));
        }

        // Fire job for send email
        SendMailVerificationJob::dispatch($request->user());

        ShareService::successToast('Verify code send successful');

        return $request->wantsJson()
            ? new JsonResponse([], 202)
            : back();
    }
}
