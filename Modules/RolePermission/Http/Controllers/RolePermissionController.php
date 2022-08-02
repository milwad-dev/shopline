<?php

namespace Modules\RolePermission\Http\Controllers;

use Modules\RolePermission\Http\Requests\RolePermissionRequest;
use Modules\Share\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    /**
     * Get latest roles.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('RolePermission::index');
    }

    /**
     * Create page for role.
     */
    public function create()
    {
        return view('RolePermission::create');
    }

    /**
     * Store role with redirect.
     *
     * @param  RolePermissionRequest $request
     * @return void
     */
    public function store(RolePermissionRequest $request)
    {

    }

    /**
     * Edit role by id.
     *
     * @param  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {


        return view('RolePermission::edit');
    }
}
