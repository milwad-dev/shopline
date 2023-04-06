<?php

namespace Modules\Panel\Tests\Feature;

use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class PanelTest extends TestCase
{
    /**
     * Test admin user can see panel page.
     *
     * @return void
     */
    public function test_admin_user_can_see_panel_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('panel.index'));
//         $response->assertViewHas();
        $response->assertViewIs('Panel::index');
    }

    /**
     * Test usual user can not see panel page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_panel_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('panel.index'));
        $response->assertStatus(403);
    }

    /**
     * Create user with login.
     *
     * @param bool $permission
     *
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(bool $permission = true): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_PANEL);
        }
    }

    /**
     * Call permission seeder.
     *
     * @return void
     */
    private function callPermissionSeeder()
    {
        $this->seed(PermissionSeeder::class);
    }
}
