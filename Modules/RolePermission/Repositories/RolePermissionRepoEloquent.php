<?php

namespace Modules\RolePermission\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionRepoEloquent implements RolePermissionRepoEloquentInterface
{
    /**
     * Get the latest roles with permissions.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function index()
    {
        return $this->query()->with('permissions')->latest();
    }

    /**
     * Find role by id.
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Delete role by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    /**
     * Get all permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPermissions()
    {
        return Permission::all();
    }

    /**
     * Builder for queue model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Role::query();
    }
}
