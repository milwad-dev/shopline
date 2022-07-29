<?php

namespace Modules\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Category\Enums\CategoryStatusEnum;
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
     */
    public function test_admin_user_can_see_create_category_page()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('categories.create'));
        $response->assertViewIs('Category::Panel.create');
    }

    /**
     * Test admin user can store category.
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
     * Create user with login.
     *
     * @return void
     */
    private function createUserWithLogin(): void
    {
        $user = User::factory()->create();
        auth()->login($user);
    }
}
