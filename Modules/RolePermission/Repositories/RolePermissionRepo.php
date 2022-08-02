<?php

namespace Modules\RolePermission\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionRepo
{
    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }

    private function query()
    {
        return Role::query();
    }
}
