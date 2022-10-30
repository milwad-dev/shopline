<?php

namespace Modules\Home\Http\Controllers\About;

use Modules\Share\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Show about-us view page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('Home::Pages.about-us.index');
    }
}
