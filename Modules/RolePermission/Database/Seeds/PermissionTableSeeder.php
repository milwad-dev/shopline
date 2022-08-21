<?php

namespace Modules\RolePermission\Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $this->createPermissionFromModel();
    }

    /**
     * Find or create permission from model.
     *
     * @return void
     */
    private function createPermissionFromModel(): void
    {
        foreach (\Modules\RolePermission\Models\Permission::$permissions as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
