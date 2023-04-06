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
    use RefreshDatabase;
    use WithFaker;

    /**
     * Get table name.
     *
     * @var string
     */
    private string $tableName = 'abouts';

    /**
     * Test admin user can see index abouts page.
     *
     * @test
     *
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
     *
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
     *
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
     *
     * @return void
     */
    public function guest_user_can_not_see_create_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('abouts.create'))->assertForbidden();
    }

    /**
     * Test admin user can store about only one.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_store_about_only_one()
    {
        $this->createUserWithLoginWithAssignPermission();

        $this->post(route('abouts.store'), ['body' => $body = $this->faker->text]);
        $this->assertDatabaseHas($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, About::query()->count());
    }

    /**
     * Test validate store about successful.
     *
     * @test
     *
     * @return void
     */
    public function validate_store_about_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $this->post(route('abouts.store'), [])->assertSessionHasErrors('body');
        $this->assertDatabaseCount($this->tableName, 0);
        $this->assertEquals(0, About::query()->count());
    }

    /**
     * Test admin user can not store about more than one.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_not_store_about_more_than_one()
    {
        $this->createUserWithLoginWithAssignPermission();

        $this->post(route('abouts.store'), ['body' => $body = $this->faker->text]);
        $this->post(route('abouts.store'), ['body' => $this->faker->text])->assertForbidden();

        $this->assertDatabaseHas($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, About::query()->count());
    }

    /**
     * Test guest user can not store about only one.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_not_store_about_only_one()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $this->post(route('abouts.store'), ['body' => $body = $this->faker->text]);
        $this->assertDatabaseMissing($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 0);
        $this->assertEquals(0, About::query()->count());
    }

    /**
     * Test admin user can see edit abouts page.
     *
     * @test
     *
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
     *
     * @return void
     */
    public function guest_user_can_not_see_edit_abouts_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('abouts.edit', About::factory()->create()->id))->assertForbidden();
    }

    /**
     * Test admin user can update about only one.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_update_about()
    {
        $this->createUserWithLoginWithAssignPermission();

        $about = About::factory()->create();

        $this->patch(route('abouts.update', $about->id), ['body' => $body = $this->faker->text]);
        $this->assertDatabaseHas($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, About::query()->count());
    }

    /**
     * Test guest user can not update about only one.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_not_update_about()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $about = About::factory()->create();

        $this->patch(route('abouts.update', $about->id), ['body' => $body = $this->faker->text]);
        $this->assertDatabaseMissing($this->tableName, ['body' => $body]);
        $this->assertDatabaseHas($this->tableName, ['body' => $about->body]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, About::query()->count());
    }

    /**
     * Create user with login & assign permission.
     *
     * @param bool $permission
     *
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
