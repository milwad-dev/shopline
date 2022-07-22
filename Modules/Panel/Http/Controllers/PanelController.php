<?php

namespace Modules\Panel\Http\Controllers;

use Modules\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function __invoke()
    {
        return view('Panel::index');
    }
}
