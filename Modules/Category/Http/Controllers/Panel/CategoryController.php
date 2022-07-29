<?php

namespace Modules\Category\Http\Controllers\Panel;

use Illuminate\Http\Request;
use Modules\Share\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Category::Panel.index');
    }

    public function create()
    {
        return view('Category::Panel.create');
    }
}
