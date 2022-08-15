<?php

namespace Modules\RolePermission\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index page of roles.
     *
     * @return void
     */
    public function test_admin_user_can_see_index_page_role()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('role-permissions.index'));
        $response->assertViewIs('RolePermission::index');
    }

    /**
     * Test admin user can see create page of roles.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_page_role()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('role-permissions.create'));
        $response->assertViewIs('RolePermission::create');
    }

    /**
     * Test store role validate been successful.
     *
     * @return void
     */
    public function test_store_role_validate_successful()
    {
        $this->createUserWithLogin();

        $response = $this->post(route('role-permissions.store'), [])->assertSessionHasErrors([
            'name',
            'permissions',
        ]);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store role.
     *
     * @return void
     */
    public function test_admin_user_can_store_role()
    {
        $this->createUserWithLogin();

        $response = $this->post(route('role-permissions.store'), [
            'name' => $this->faker->title,
            'permissions' => [Permission::PERMISSION_SUPER_ADMIN, Permission::PERMISSION_CATEGORIES]
        ]);
        $this->assertEquals(1, Role::query()->count());
        $response->assertRedirect();
    }

    /**
     * Test admin user can see edit page of role.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_page_role()
    {
        $this->createUserWithLogin();
        $role = $this->createRole();

        $response = $this->get(route('role-permissions.edit', $role->id));
        $response->assertViewIs('RolePermission::edit');
    }

    /**
     * Test admin user can update role by id.
     *
     * @return void
     */
    public function test_admin_user_can_update_role()
    {
        $this->createUserWithLogin();
        $role = $this->createRole();

        $response = $this->patch(route('role-permissions.update', $role->id), [
            'name' => 'Milwad',
            'permissions' => [Permission::PERMISSION_USERS, Permission::PERMISSION_PANEL]
        ]);
        $response->assertRedirect();

        $this->assertEquals(1, Role::query()->count());
    }

    /**
     * Test admin user can delete role by id.
     *
     * @return void
     */
    public function test_admin_user_can_delete_role()
    {
        $this->createUserWithLogin();
        $role = $this->createRole();

        $this->delete(route('role-permissions.destroy', $role->id))->assertOk();
        $this->assertEquals(0, Role::query()->count());
    }

    /**
     * Create roll with permission.
     *
     * @return mixed
     */
    public function createRole()
    {
        return Role::query()->create([
            'name' => $this->faker->name,
        ])->syncPermissions(Permission::PERMISSION_SUPER_ADMIN);
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

    /**
     * Create user with login.
     *
     * @return void
     */
    private function createUserWithLogin(): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        $user->givePermissionTo(Permission::PERMISSION_ROLE_PERMISSIONS);
    }
}
