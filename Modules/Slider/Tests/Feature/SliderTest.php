<?php

namespace Modules\Slider\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\User\Models\User;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

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
     * Test admin user can see slider create page.
     *
     * @test
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
     * @return void
     */
    public function usual_user_can_not_see_slider_create_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('sliders.create'));
        $response->assertStatus(403);
    }

    /**
     * Test admin user can store slider.
     *
     * @test
     * @return void
     */
    public function admin_user_can_store_slider()
    {
        $this->withoutExceptionHandling();
        $this->createUserWithLoginWithAssignPermission();

        $link = 'google.com';
        $response = $this->post(route('sliders.store'), [
            'image' => UploadedFile::fake()->image('google.jpg'),
            'link' => $link,
            'status' => SliderStatusEnum::STATUS_ACTIVE->value,
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('sliders.index'));

        $this->assertDatabaseHas('sliders', [
            'link' => $link,
        ]);
        $this->assertDatabaseCount('sliders', 1);
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
