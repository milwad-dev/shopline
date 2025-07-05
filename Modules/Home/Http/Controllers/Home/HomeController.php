<?php

namespace Modules\Home\Http\Controllers\Home;

use Modules\Home\Repositories\Home\HomeRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show home page.
     */
    public function index(HomeRepoEloquentInterface $homeRepo): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('Home::Pages.home.index', compact('homeRepo'));
    }
}
