<?php

namespace Modules\RolePermission\Repositories;

use Modules\RolePermission\Models\RolePermission;
use Spatie\Permission\Models\Role;

class RolePermissionRepo
{
    public function index()
    {

    }

    public function findById($id)
    {

    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    private function query()
    {
        return Role::query();
    }
}
