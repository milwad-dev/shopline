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
        $response->assertViewIs('User::Panel.index');
        $response->assertViewHas('users');
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
        $response->assertViewIs('User::Panel.create');
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
     * Test admin user can delete user.
     *
     * @return void
     */
    public function test_admin_user_can_delete_user()
    {
        $this->createUserWithLoginWithAssignPermission();

        // TODO FIX BUG
        $response = $this->delete(route('users.destroy', auth()->id()))->assertOk();

        $this->assertDatabaseCount('users', 0);
//        $this->assertDatabaseMissing('users', [
//            'email' => 'sally@example.com',
//        ]);
    }

    /**
     * Create user with login.
     *
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        $user->givePermissionTo(Permission::PERMISSION_USERS);
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
