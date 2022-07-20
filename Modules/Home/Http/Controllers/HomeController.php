<?php

namespace Modules\Home\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Home::index');
    }
}
