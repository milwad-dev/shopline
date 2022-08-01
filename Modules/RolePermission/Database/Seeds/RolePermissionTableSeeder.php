<?php

namespace Modules\RolePermission\Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    public function run()
    {
        foreach (\Modules\RolePermission\Models\Permission::$permissions as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
