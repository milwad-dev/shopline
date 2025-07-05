<?php

namespace Modules\RolePermission\Services;

use Modules\RolePermission\Repositories\RolePermissionRepoEloquent;
use Spatie\Permission\Models\Role;

class RolePermissionService
{
    /**
     * Store role with assign permissions.
     *
     *
     * @return mixed
     */
    public function store($request)
    {
        return $this->query()
            ->create(['name' => $request->name])
            ->syncPermissions($request->permissions);
    }

    /**
     * Update role with sync permissions.
     *
     *
     * @return mixed
     */
    public function update($request, $id)
    {
        $roleRepo = new RolePermissionRepoEloquent;
        $role = $roleRepo->findById($id);

        return $role
            ->syncPermissions($request->permissions)
            ->update(['name' => $request->name]);
    }

    /**
     * Get query for model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Role::query();
    }
}
