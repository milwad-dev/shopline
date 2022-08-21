<?php

namespace Modules\RolePermission\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index page of roles.
     *
     * @return void
     */
    public function test_admin_user_can_see_index_page_role()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('role-permissions.index'));
        $response->assertViewHas('roles');
        $response->assertViewIs('RolePermission::index');
    }

    /**
     * Test usual user can not see index page of roles.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_index_page_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('role-permissions.index'));
        $response->assertStatus(403);
    }

    /**
     * Test admin user can see create page of roles.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_page_role()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('role-permissions.create'));
        $response->assertViewHas('permissions');
        $response->assertViewIs('RolePermission::create');
    }

    /**
     * Test usual user can not see create page of roles.
     *
     * @return void
     */
    public function test_usual_user_can_see_create_page_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('role-permissions.create'));
        $response->assertStatus(403);
    }

    /**
     * Test store role validate been successful.
     *
     * @return void
     */
    public function test_store_role_validate_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('role-permissions.store'), []);
        $response->assertSessionHasErrors(['name', 'permissions']);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store role.
     *
     * @return void
     */
    public function test_admin_user_can_store_role()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('role-permissions.store'), [
            'name' => $this->faker->title,
            'permissions' => [Permission::PERMISSION_SUPER_ADMIN, Permission::PERMISSION_CATEGORIES]
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('role-permissions.index'));

        $this->assertEquals(1, Role::query()->count());
    }

    /**
     * Test usual user can not store role.
     *
     * @return void
     */
    public function test_usual_user_can_not_store_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->post(route('role-permissions.store'), [
            'name' => $this->faker->title,
            'permissions' => [Permission::PERMISSION_SUPER_ADMIN, Permission::PERMISSION_CATEGORIES]
        ]);
        $response->assertStatus(403);

        $this->assertEquals(0, Role::query()->count());
    }

    /**
     * Test admin user can see edit page of role.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_page_role()
    {
        $this->createUserWithLoginWithAssignPermission();
        $role = $this->createRole();

        $response = $this->get(route('role-permissions.edit', $role->id));
        $response->assertViewHas(['role', 'permissions']);
        $response->assertViewIs('RolePermission::edit');
    }

    /**
     * Test usual user can see edit page of role.
     *
     * @return void
     */
    public function test_usual_user_can_see_edit_page_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $role = $this->createRole();
        $response = $this->get(route('role-permissions.edit', $role->id));
        $response->assertStatus(403);
    }

    /**
     * Test admin user can update role by id.
     *
     * @return void
     */
    public function test_admin_user_can_update_role()
    {
        $this->createUserWithLoginWithAssignPermission();

        $role = $this->createRole();
        $response = $this->patch(route('role-permissions.update', $role->id), [
            'id' => $role->id,
            'name' => 'Milwad',
            'permissions' => [Permission::PERMISSION_USERS, Permission::PERMISSION_PANEL]
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('role-permissions.index'));

        $this->assertEquals(1, Role::query()->count());
    }

    /**
     * Test usual user can not update role by id.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $role = $this->createRole();
        $response = $this->patch(route('role-permissions.update', $role->id), [
            'id' => $role->id,
            'name' => 'Milwad',
            'permissions' => [Permission::PERMISSION_USERS, Permission::PERMISSION_PANEL]
        ]);
        $response->assertStatus(403);
    }

    /**
     * Test admin user can delete role by id.
     *
     * @return void
     */
    public function test_admin_user_can_delete_role()
    {
        $this->createUserWithLoginWithAssignPermission();
        $role = $this->createRole();

        $this->delete(route('role-permissions.destroy', $role->id))->assertOk();
        $this->assertEquals(0, Role::query()->count());
    }

    /**
     * Test usual user can not delete role by id.
     *
     * @return void
     */
    public function test_usual_user_can_not_delete_role()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $role = $this->createRole();

        $response = $this->delete(route('role-permissions.destroy', $role->id));
        $response->assertStatus(403);
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
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(bool $permission = true): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_ROLE_PERMISSIONS);
        }
    }
}
