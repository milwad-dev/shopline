<?php

namespace Modules\Slider\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;
use Modules\User\Models\User;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test admin user can see slider index page.
     *
     * @test
     *
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
     *
     * @return void
     */
    public function usual_user_can_not_see_slider_index_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('sliders.index'));
        $response->assertForbidden();
    }

    /**
     * Test admin user can see slider create page.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_see_slider_create_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('sliders.create'));
        $response->assertViewIs('Slider::create');
    }

    /**
     * Test usual user can not see slider create page.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_not_see_slider_create_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('sliders.create'));
        $response->assertForbidden();
    }

    /**
     * Test admin user can store slider.
     *
     * @test
     *
     * @throws \Exception
     *
     * @return void
     */
    public function admin_user_can_store_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $link = 'google.com';
        $title = $this->faker->title;
        $title_color = random_int(111111, 9999999);

        $response = $this->post(route('sliders.store'), [
            'image'       => UploadedFile::fake()->image('google.jpg'),
            'link'        => $link,
            'status'      => SliderStatusEnum::STATUS_ACTIVE->value,
            'title'       => $title,
            'title_color' => $title_color,
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('sliders.index'));

        $this->assertDatabaseHas('sliders', [
            'link'        => $link,
            'title'       => $title,
            'title_color' => $title_color,
        ]);
        $this->assertDatabaseCount('sliders', 1);
    }

    /**
     * Test usual user can not store slider.
     *
     * @test
     *
     * @throws \Exception
     *
     * @return void
     */
    public function usual_user_can_not_store_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->post(route('sliders.store'), [
            'image'       => UploadedFile::fake()->image('google.jpg'),
            'link'        => 'google.com',
            'status'      => SliderStatusEnum::STATUS_ACTIVE->value,
            'title'       => $this->faker->title,
            'title_color' => random_int(111111, 9999999),
        ]);
        $response->assertForbidden();
    }

    /**
     * Test store slider validated successful.
     *
     * @test
     *
     * @return void
     */
    public function store_slider_validated_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('sliders.store'), []);
        $response->assertSessionHasErrors(['image', 'link', 'status', 'title', 'title_color']);
        $response->assertRedirect();

        $this->assertDatabaseCount('sliders', 0);
    }

    /**
     * Test admin user can edit slider by id.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_edit_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create();
        $response = $this->get(route('sliders.edit', $slider->id));
        $response->assertViewIs('Slider::edit');
        $response->assertViewHas('slider');
    }

    /**
     * Test usual user can not edit slider by id.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_not_edit_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $slider = Slider::factory()->create();
        $response = $this->get(route('sliders.edit', $slider->id));
        $response->assertForbidden();
    }

    /**
     * Test admin user can update slider by id.
     *
     * @test
     *
     * @throws \Exception
     *
     * @return void
     */
    public function admin_user_can_update_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create();
        $link = 'milwad.ir';

        $response = $this->patch(route('sliders.update', $slider->id), [
            'image'         => UploadedFile::fake()->image('slider.jpg'),
            'status'        => SliderStatusEnum::STATUS_INACTIVE->value,
            'link'          => $link,
            'title'         => $this->faker->title,
            'title_color'   => random_int(111111, 9999999),
        ]);
        $response->assertRedirect(route('sliders.index'));

        $this->assertDatabaseCount('sliders', 1);
        $this->assertDatabaseHas('sliders', [
            'link'   => $link,
            'status' => SliderStatusEnum::STATUS_INACTIVE->value,
        ]);
    }

    /**
     * Test usual user can not update slider by id.
     *
     * @test
     *
     * @throws \Exception
     *
     * @return void
     */
    public function usual_user_can_not_update_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $slider = Slider::factory()->create();
        $response = $this->patch(route('sliders.update', $slider->id), [
            'image'         => UploadedFile::fake()->image('slider.jpg'),
            'link'          => 'milwad.ir',
            'status'        => SliderStatusEnum::STATUS_INACTIVE->value,
            'title'         => $this->faker->title,
            'title_color'   => random_int(111111, 9999999),
        ]);
        $response->assertForbidden();
    }

    /**
     * Test update slider validated successful.
     *
     * @test
     *
     * @return void
     */
    public function update_slider_validated_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create();
        $response = $this->patch(route('sliders.update', $slider->id), []);
        $response->assertSessionHasErrors(['link', 'status', 'title', 'title_color']);
        $response->assertRedirect();

        $this->assertDatabaseCount('sliders', 1);
    }

    /**
     * Test admin user can delete slider.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_delete_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create();
        $response = $this->delete(route('sliders.destroy', $slider->id));
        $response->assertOk();

        $this->assertDatabaseCount('sliders', 0);
    }

    /**
     * Test usual user can not delete slider.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_not_delete_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $slider = Slider::factory()->create();
        $response = $this->delete(route('sliders.destroy', $slider->id));
        $response->assertForbidden();

        $this->assertDatabaseCount('sliders', 1);
    }

    /**
     * Test admin user can update status to active slider.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_update_status_to_active_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create(['status' => SliderStatusEnum::STATUS_INACTIVE->value]);
        $response = $this->patch(route('sliders.active', $slider->id));
        $response->assertOk();

        $this->assertDatabaseCount('sliders', 1);
        $this->assertDatabaseHas('sliders', ['status' => SliderStatusEnum::STATUS_ACTIVE->value]);
    }

    /**
     * Test usual user can update status to active slider.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_update_status_to_active_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $slider = Slider::factory()->create(['status' => SliderStatusEnum::STATUS_INACTIVE->value]);
        $response = $this->patch(route('sliders.active', $slider->id));
        $response->assertForbidden();

        $this->assertDatabaseCount('sliders', 1);
        $this->assertDatabaseHas('sliders', ['status' => SliderStatusEnum::STATUS_INACTIVE->value]);
    }

    /**
     * Test admin user can update status to inactive slider.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_update_status_to_inactive_slider()
    {
        $this->createUserWithLoginWithAssignPermission();

        $slider = Slider::factory()->create(['status' => SliderStatusEnum::STATUS_ACTIVE->value]);
        $response = $this->patch(route('sliders.inactive', $slider->id));
        $response->assertOk();

        $this->assertDatabaseCount('sliders', 1);
        $this->assertDatabaseHas('sliders', ['status' => SliderStatusEnum::STATUS_INACTIVE->value]);
    }

    /**
     * Test usual user can update status to inactive slider.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_update_status_to_inactive_slider()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $slider = Slider::factory()->create(['status' => SliderStatusEnum::STATUS_ACTIVE->value]);
        $response = $this->patch(route('sliders.inactive', $slider->id));
        $response->assertForbidden();

        $this->assertDatabaseCount('sliders', 1);
        $this->assertDatabaseHas('sliders', ['status' => SliderStatusEnum::STATUS_ACTIVE->value]);
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
