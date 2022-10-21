<?php

namespace Modules\Home\Http\Controllers\Checkout;

use Modules\Share\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Show checkout view page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('Home::Pages.checkouts.index');
    }
}
