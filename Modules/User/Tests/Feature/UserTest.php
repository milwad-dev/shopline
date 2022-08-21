<?php

namespace Modules\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Enums\UserTypeEnum;
use Modules\User\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Admin user can see list of the latest users.
     *
     * @return void
     */
    public function test_admin_user_can_see_latest_users_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('users.index'));
        $response->assertViewIs('User::index');
        $response->assertViewHas('users');
    }

    /**
     * Test usual user can not see list of the latest users.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_latest_users_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('users.index'));
        $response->assertStatus(403);
    }

    /**
     * Test admin user can see create user page.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_user_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('users.create'));
        $response->assertViewIs('User::create');
    }

    /**
     * Test usual user can not see create user page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_create_user_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('users.create'));
        $response->assertStatus(403);
    }

    /**
     * Test validate store new user.
     *
     * @return void
     */
    public function test_validate_store_new_user()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('users.store'), []);
        $response->assertSessionHasErrors(['name', 'email', 'phone', 'type', 'password']);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store new user.
     *
     * @return void
     */
    public function test_admin_user_can_store_new_user()
    {
        $this->createUserWithLoginWithAssignPermission();

        $email = $this->faker->unique()->email;
        $phone = 12345678900;

        $response = $this->post(route('users.store'), [
            'name' => $this->faker->name,
            'email' => $email,
            'phone' => $phone,
            'type' => UserTypeEnum::TYPE_CUSTOMER->value,
            'password' => 'Milwad123!',
        ]);
        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('alert');

        $this->assertDatabaseCount('users', 2);
        $this->assertDatabaseHas('users', [
             'email' => $email,
             'phone' => $phone,
        ]);
    }

    /**
     * Test usual user can not store new user.
     *
     * @return void
     */
    public function test_usual_user_can_not_store_new_user()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $email = $this->faker->unique()->email;
        $phone = 12345678900;

        $response = $this->post(route('users.store'), [
            'name' => $this->faker->name,
            'email' => $email,
            'phone' => $phone,
            'type' => UserTypeEnum::TYPE_CUSTOMER->value,
            'password' => 'Milwad123!',
        ]);
        $response->assertStatus(403);
    }

    /**
     * Test admin user can see edit user page.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_user_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $user = User::factory()->create();
        $response = $this->get(route('users.edit', $user->id));
        $response->assertViewIs('User::edit');
    }

    /**
     * Test usual user can not see edit user page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_edit_user_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $user = User::factory()->create();
        $response = $this->get(route('users.edit', $user->id));
        $response->assertStatus(403);
    }

    /**
     * Test admin user can store new user.
     *
     * @return void
     */
    public function test_admin_user_can_update_user()
    {
        $this->createUserWithLoginWithAssignPermission();

        $email = $this->faker->unique()->email;
        $phone = 12345678900;
        $user = User::factory()->create();

        $response = $this->patch(route('users.update', $user->id), [
            'id'        => $user->id,
            'name'      => $this->faker->name,
            'email'     => $email,
            'phone'     => $phone,
            'type'      => UserTypeEnum::TYPE_VENDOR->value,
            'password'  => 'Milwad123!',
        ]);
        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('alert');

        $this->assertDatabaseCount('users', 2);
        $this->assertDatabaseHas('users', [
            'email' => $email,
            'phone' => $phone,
        ]);
    }

    /**
     * Test usual user can not update user.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_user()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $email = $this->faker->unique()->email;
        $phone = 12345678900;
        $user = User::factory()->create();

        $response = $this->patch(route('users.update', $user->id), [
            'id'        => $user->id,
            'name'      => $this->faker->name,
            'email'     => $email,
            'phone'     => $phone,
            'type'      => UserTypeEnum::TYPE_VENDOR->value,
            'password'  => 'Milwad123!',
        ]);
        $response->assertStatus(403);
    }

    /**
     * Test admin user can delete user.
     *
     * @return void
     */
    public function test_admin_user_can_delete_user()
    {
        $user = User::factory()->create();
        $this->createUserWithLoginWithAssignPermission();

        $this->delete(route('users.destroy', $user->id))->assertOk();
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    /**
     * Test usual user can not delete user.
     *
     * @return void
     */
    public function test_usual_user_can_not_delete_user()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $user = User::factory()->create();
        $response = $this->delete(route('users.destroy', $user->id));
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
            $user->givePermissionTo(Permission::PERMISSION_USERS);
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
