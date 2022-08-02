<?php

namespace Modules\RolePermission\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Modules\RolePermission\Http\Requests\RolePermissionRequest;
use Modules\RolePermission\Services\RolePermissionService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class RolePermissionController extends Controller
{
    public RolePermissionService $service;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->service = $rolePermissionService;
    }

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
     * @return RedirectResponse
     */
    public function store(RolePermissionRequest $request)
    {
        $this->service->store($request);

        return $this->successMessageWithRedirect('Create Role');
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

    /**
     * Show success message with redirect.
     *
     * @param  string $title
     * @return RedirectResponse
     */
    public function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('role-permissions.index');
    }
}
