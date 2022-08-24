<?php

namespace Modules\Slider\Tests\Feature;

use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class SliderTest extends TestCase
{
    /**
     * Test admin user can see slider index page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_slider_index_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('sliders.index'));
        $response->assertViewIs('Slider::index');
        $response->assertViewHas('sliders');
    }

    /**
     * Test usual user can not see slider index page.
     *
     * @test
     * @return void
     */
    public function usual_user_can_not_see_slider_index_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('sliders.index'));
        $response->assertStatus(403);
    }

    /**
     * Create user with login.
     *
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(bool $permission = true): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_SLIDERS);
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
