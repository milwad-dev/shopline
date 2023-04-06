<?php

namespace Modules\Advertising\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Advertising\Enums\AdvertisingLocationEnum;
use Modules\Advertising\Enums\AdvertisingStatusEnum;
use Modules\Advertising\Models\Advertising;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class AdvertisingTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

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
     * Test admin user can see advertising create page.
     *
     * @return void
     */
    public function test_admin_user_can_see_advertising_create_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('advertisings.create'));
        $response->assertViewIs('Advertising::create');
    }

    /**
     * Test usual user can not see advertising create page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_advertising_create_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $response = $this->get(route('advertisings.create'));
        $response->assertForbidden();
    }

    /**
     * Test validate store advertising be successful.
     *
     * @return void
     */
    public function test_validate_store_advertising_be_successful()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->post(route('advertisings.store'), []);
        $response->assertSessionHasErrors(['image', 'location', 'status']);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store advertising.
     *
     * @return void
     */
    public function test_admin_user_can_store_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $link = $this->faker->url;
        $title = $this->faker->title;

        $response = $this->post(route('advertisings.store'), [
            'image'    => UploadedFile::fake()->image('advertisings.jpg'),
            'link'     => $link,
            'title'    => $title,
            'location' => AdvertisingLocationEnum::LOCATION_BANNER->value,
            'status'   => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('advertisings.index'));

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'link'     => $link,
            'title'    => $title,
            'location' => AdvertisingLocationEnum::LOCATION_BANNER->value,
            'status'   => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]);
    }

    /**
     * Test usual user can not store advertising.
     *
     * @return void
     */
    public function test_usual_user_can_not_store_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $this->post(route('advertisings.store'), [
            'image'    => UploadedFile::fake()->image('advertisings.jpg'),
            'link'     => $this->faker->url,
            'title'    => $this->faker->title,
            'location' => AdvertisingLocationEnum::LOCATION_BANNER->value,
            'status'   => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ])->assertForbidden();

        $this->assertDatabaseCount('advertisings', 0);
        $this->assertDatabaseMissing('advertisings', [
            'location' => AdvertisingLocationEnum::LOCATION_BANNER->value,
            'status'   => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]);
    }

    /**
     * Test admin user can see adveritisng edit page.
     *
     * @return void
     */
    public function test_admin_user_can_see_advertising_edit_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create();

        $response = $this->get(route('advertisings.edit', $advertising->id));
        $response->assertViewHas('advertising');
        $response->assertViewIs('Advertising::edit');
    }

    /**
     * Test usual user can not see adveritisng edit page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_advertising_edit_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $advertising = Advertising::factory()->create();
        $response = $this->get(route('advertisings.edit', $advertising->id));
        $response->assertForbidden();
    }

    /**
     * Test validate update advertising be successful.
     *
     * @return void
     */
    public function test_validate_upate_advertising_be_successful()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create();

        $response = $this->patch(route('advertisings.update', $advertising->id), []);
        $response->assertSessionHasErrors(['location', 'status']);
        $response->assertRedirect();

        $this->assertDatabaseCount('advertisings', 1);
    }

    /**
     * Test admin user can update advertising.
     *
     * @return void
     */
    public function test_admin_user_can_update_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create();
        $link = $this->faker->url;
        $title = $this->faker->title;

        $response = $this->patch(route('advertisings.update', $advertising->id), [
            'image'    => UploadedFile::fake()->image('advertisings-update.jpg'),
            'link'     => $link,
            'title'    => $title,
            'location' => AdvertisingLocationEnum::LOCATION_BLOG_PAGE->value,
            'status'   => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('advertisings.index'));

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'link'     => $link,
            'title'    => $title,
            'location' => AdvertisingLocationEnum::LOCATION_BLOG_PAGE->value,
            'status'   => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]);
    }

    /**
     * Test usual user can not update advertising.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $advertising = Advertising::factory()->create();
        $link = $this->faker->url;
        $title = $this->faker->title;

        $response = $this->patch(route('advertisings.update', $advertising->id), [
            'image'    => UploadedFile::fake()->image('advertisings-update.jpg'),
            'link'     => $link,
            'title'    => $title,
            'location' => AdvertisingLocationEnum::LOCATION_BLOG_PAGE->value,
            'status'   => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]);
        $response->assertForbidden();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseMissing('advertisings', [
            'link'  => $link,
            'title' => $title,
        ]);
    }

    /**
     * Test usual user can not delete advertsing.
     *
     * @return void
     */
    public function test_usual_user_not_can_delete_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $advertising = Advertising::factory()->create();
        $response = $this->delete(route('advertisings.destroy', $advertising->id));
        $response->assertForbidden();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'title' => $advertising->title,
        ]);
    }

    /**
     * Test admin user can delete advertsing.
     *
     * @return void
     */
    public function test_admin_user_can_delete_advertising()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create();
        $response = $this->delete(route('advertisings.destroy', $advertising->id));
        $response->assertOk();

        $this->assertDatabaseCount('advertisings', 0);
        $this->assertDatabaseMissing('advertisings', [
            'title' => $advertising->title,
        ]);
    }

    /**
     * Test admin user can update status advertising to active.
     *
     * @return void
     */
    public function test_admin_user_can_update_status_advertising_to_active()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create(['status' => AdvertisingStatusEnum::STATUS_INACTIVE->value]);
        $response = $this->patch(route('advertisings.update.status', [
            'id'     => $advertising->id,
            'status' => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]));
        $response->assertOk();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'title'  => $advertising->title,
            'status' => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]);
    }

    /**
     * Test usual user can not update status advertising to active.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_status_advertising_to_active()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $advertising = Advertising::factory()->create(['status' => AdvertisingStatusEnum::STATUS_INACTIVE->value]);
        $response = $this->patch(route('advertisings.update.status', [
            'id'     => $advertising->id,
            'status' => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]));
        $response->assertForbidden();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'title'  => $advertising->title,
            'status' => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]);
    }

    /**
     * Test admin user can update status advertising to inactive.
     *
     * @return void
     */
    public function test_admin_user_can_update_status_advertising_to_inactive()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $advertising = Advertising::factory()->create();
        $response = $this->patch(route('advertisings.update.status', [
            'id'     => $advertising->id,
            'status' => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]));
        $response->assertOk();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'title'  => $advertising->title,
            'status' => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]);
    }

    /**
     * Test usual user can not update status advertising to inactive.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_status_advertising_to_inactive()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $advertising = Advertising::factory()->create();
        $response = $this->patch(route('advertisings.update.status', [
            'id'     => $advertising->id,
            'status' => AdvertisingStatusEnum::STATUS_INACTIVE->value,
        ]));
        $response->assertForbidden();

        $this->assertDatabaseCount('advertisings', 1);
        $this->assertDatabaseHas('advertisings', [
            'title'  => $advertising->title,
            'status' => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ]);
    }

    /**
     * Create user with login.
     *
     * @param bool $permission
     *
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
