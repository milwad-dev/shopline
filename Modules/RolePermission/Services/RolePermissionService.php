<?php

namespace Modules\RolePermission\Services;

use Modules\RolePermission\Models\RolePermission;

class RolePermissionService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    private function query()
    {
        return RolePermission::query();
    }
}
        