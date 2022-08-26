<?php

namespace Modules\Advertising\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class AdvertisingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see advertising index page.
     *
     * @return void
     */
    public function test_admin_user_can_see_advertising_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('advertisings.index'));
        $response->assertViewIs('Advertising::index');
        $response->assertViewHas('advertisings');
    }

    /**
     * Test usual user can not see advertising index page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_advertising_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $response = $this->get(route('advertisings.index'));
        $response->assertForbidden();
    }

    /**
     * Create user with login.
     *
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermissionWithAssignPermission(bool $permission = true): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_ADVERTISINGS);
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
