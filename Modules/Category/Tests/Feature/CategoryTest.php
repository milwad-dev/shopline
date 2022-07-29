<?php

namespace Modules\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
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
        $this->createUserWithLogin();

        $response = $this->get(route('categories.index'));
        $response->assertViewIs('Category::Panel.index');
    }

    /**
     * Test admin user can see create category page.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_category_page()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('categories.create'));
        $response->assertViewIs('Category::Panel.create');
    }

    /**
     * Test admin user can store category.
     *
     * @return void
     */
    public function test_admin_user_can_store_category()
    {
        $this->createUserWithLogin();

        $response = $this->post(route('categories.store'), [
            'parent_id' => null,
            'title' => $this->faker->title,
            'keywords' => $this->faker->text(),
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => null,
        ]);
        $response->assertRedirect();
    }

    /**
     * Test admin user can see edit category page.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_category_page()
    {
        $this->createUserWithLogin();

        $category = $this->createCategory();
        $response = $this->get(route('categories.edit', $category->id));
        $response->assertViewIs('Category::Panel.edit');
    }

    /**
     * Test admin user can update category.
     *
     * @return void
     */
    public function test_admin_user_can_update_categoroy()
    {
        $this->createUserWithLogin();
        $category = $this->createCategory();

        $response = $this->patch(route('categories.update', $category->id), [
            'id' => $category->id,
            'title' => 'milwad dev',
            'description' => 'shopline category',
        ]);
        $response->assertRedirect();
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
}
