<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class LogoutController extends Controller
{
    /**
     * Logout user with magic method invoke.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        Auth::logout();

        ShareService::successToast('You logout successfully');

        return to_route('home.index');
    }
}
