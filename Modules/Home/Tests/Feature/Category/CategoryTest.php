<?php

namespace Modules\Home\Tests\Feature\Category;

use Modules\Category\Models\Category;
use Modules\User\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test guest user can see category details page.
     *
     * @test
     * @return void
     */
    public function guest_user_can_see_category_details_page()
    {
        $this->get(route('categories.details', Category::factory()->create()->id))
            ->assertViewHas('Home::Pages.categories.detail')
            ->assertViewHas(['category', 'products']);
    }

    /**
     * Test login user can see category details page.
     *
     * @test
     * @return void
     */
    public function login_user_can_see_category_details_page()
    {
        auth()->login(User::factory()->create());

        $this->get(route('categories.details', Category::factory()->create()->id))
            ->assertViewHas('Home::Pages.categories.detail')
            ->assertViewHas(['category', 'products']);
    }
}
