<?php

namespace Modules\About\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\About\Models\About;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class AboutTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index abouts page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_index_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('abouts.index'));
        $response->assertViewHas('abouts');
        $response->assertViewIs('About::index');
    }

    /**
     * Test guest user can not see index abouts page.
     *
     * @test
     * @return void
     */
    public function guest_user_can_not_see_index_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('abouts.index'))->assertForbidden();
    }

    /**
     * Test admin user can see create abouts page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_create_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission();
        $this->get(route('abouts.create'))->assertViewIs('About::create');
    }

    /**
     * Test guest user can not see create abouts page.
     *
     * @test
     * @return void
     */
    public function guest_user_can_not_see_create_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('abouts.create'))->assertForbidden();
    }

    /**
     * Test admin user can see edit abouts page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_edit_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission();
        $this->get(route('abouts.edit', About::factory()->create()->id))
            ->assertViewIs('About::edit');
    }

    /**
     * Test guest user can not see edit abouts page.
     *
     * @test
     * @return void
     */
    public function guest_user_can_not_see_edit_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('abouts.edit', About::factory()->create()->id))->assertForbidden();
    }

    /**
     * Create user with login & assign permission.
     *
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(bool $permission = true)
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_ABOUTS);
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
