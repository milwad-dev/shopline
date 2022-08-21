<?php

namespace Modules\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\Share\Services\ShareService;
use Modules\User\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see list of category.
     *
     * @return void
     */
    public function test_admin_user_can_see_list_of_category()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('categories.index'));
        $response->assertViewIs('Category::index');
        $response->assertViewHas('categories');
    }

    /**
     * Test admin user can see create category page.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_category_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('categories.create'));
        $response->assertViewIs('Category::create');
        $response->assertViewHas('parents');
    }

    /**
     * Test validate for store category is successful.
     *
     * @return void
     */
    public function test_store_category_validate_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('categories.store'), [])->assertSessionHasErrors([
            'title',
            'status',
        ]);
        $response->assertRedirect();
    }

    /**
     * Test check parent id validation is successful.
     *
     * @return void
     * @throws \Exception
     */
    public function test_parent_id_validation_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('categories.store'), [
            'parent_id' => random_int(1, 10)
        ])->assertSessionHasErrors([
            'title',
            'status',
            'parent_id',
        ]);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store category.
     *
     * @return void
     */
    public function test_admin_user_can_store_category()
    {
        $this->createUserWithLoginWithAssignPermission();

        $title = $this->faker->unique()->title;
        $response = $this->post(route('categories.store'), [
            'parent_id' => null,
            'title' => $title,
            'keywords' => $this->faker->text(),
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => null,
        ]);
        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('alert');

        $this->assertDatabaseHas('categories', [
            'title' => $title,
        ]);
        $this->assertDatabaseCount('categories', 1);
        $this->assertEquals(1, Category::query()->count());
    }

    /**
     * Test admin user can see edit category page.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_category_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $category = $this->createCategory();
        $response = $this->get(route('categories.edit', $category->id));
        $response->assertViewIs('Category::edit');
        $response->assertViewHas(['category', 'parents']);
    }

    /**
     * Test validate for store category is successful.
     *
     * @return void
     */
    public function test_update_category_validate_successful()
    {
        $this->createUserWithLoginWithAssignPermission();

        $category = $this->createCategory();
        $response = $this->patch(route('categories.update', $category->id), [
            'id' => $category->id,
        ]);
        $response->assertSessionHasErrors([
            'title',
            'status',
        ]);
        $response->assertRedirect();
    }

    /**
     * Test admin user can update category.
     *
     * @return void
     */
    public function test_admin_user_can_update_categoroy()
    {
        $this->withoutExceptionHandling();
        $this->createUserWithLoginWithAssignPermission();

        $title = 'milwad dev';
        $category = $this->createCategory();
        $response = $this->patch(route('categories.update', $category->id), [
            'id' => $category->id,
            'title' => $title,
            'description' => 'shopline category',
            'status' => CategoryStatusEnum::STATUS_INACTIVE->value,
        ]);
        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('alert');

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'title' => $title,
            'status' => CategoryStatusEnum::STATUS_INACTIVE->value,
            'description' => 'shopline category',
        ]);
        $this->assertDatabaseCount('categories', 1);
        $this->assertEquals(1, Category::query()->count());
    }

    /**
     * Test admin user can delete category.
     *
     * @return void
     */
    public function test_admin_user_can_delete_category()
    {
        $this->createUserWithLoginWithAssignPermission();
        $category = $this->createCategory();

        $this->delete(route('categories.destroy', $category->id))->assertOk();
        $this->assertDatabaseCount('categories', 0);
        $this->assertEquals(0, Category::query()->count());
    }

    /**
     * Test admin user can change status category to active.
     *
     * @return void
     */
    public function test_admin_user_can_change_status_category_to_active()
    {
        $this->createUserWithLoginWithAssignPermission();
        $category = $this->createCategory();

        $this->patch(route('categories.change.status.active', $category->id))->assertOk();
        $this->assertDatabaseHas('categories', [
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
        ]);
        $this->assertDatabaseCount('categories', 1);
    }

    /**
     * Test admin user can change status category to inactive.
     *
     * @return void
     */
    public function test_admin_user_can_change_status_category_to_inactive()
    {
        $this->createUserWithLoginWithAssignPermission();
        $category = $this->createCategory();

        $this->patch(route('categories.change.status.inactive', $category->id))->assertOk();
        $this->assertDatabaseHas('categories', [
            'status' => CategoryStatusEnum::STATUS_INACTIVE->value,
        ]);
        $this->assertDatabaseCount('categories', 1);
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
        $user->givePermissionTo(Permission::PERMISSION_CATEGORIES);
    }

    /**
     * Create category.
     *
     * @return \Illuminate\Testing\TestResponse
     */
    private function createCategory()
    {
        return Category::factory()->create([
            'user_id' => auth()->id(),
            'parent_id' => null,
            'title' => $this->faker->title,
            'slug' => ShareService::makeSlug($this->faker->title),
            'keywords' => $this->faker->text(),
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => null,
        ]);
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
