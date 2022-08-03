<?php

namespace Modules\Panel\Http\Controllers;

use Modules\Panel\Models\Panel;
use Modules\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function __invoke()
    {
        $this->authorize('manage', Panel::class);
        return view('Panel::index');
    }
}
