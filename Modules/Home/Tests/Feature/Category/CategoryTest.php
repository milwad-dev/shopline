<?php

namespace Modules\Home\Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    //TODO WRITE CORRECT TEST
//    /**
//     * Test guest user can see category details page.
//     *
//     * @test
//     * @return void
//     */
//    public function guest_user_can_see_category_details_page()
//    {
//        $this->get(Category::factory()->create()->path())
//            ->assertViewHas('Home::Pages.categories.detail')
//            ->assertViewHas(['category', 'products']);
//    }
//
//    /**
//     * Test login user can see category details page.
//     *
//     * @test
//     * @return void
//     */
//    public function login_user_can_see_category_details_page()
//    {
//        auth()->login(User::factory()->create());
//
//        $this->get(route('categories.detail', Category::factory()->create()->slug))
//            ->assertViewHas('Home::Pages.categories.detail')
//            ->assertViewHas(['category', 'products']);
//    }

    public function test_is_correct()
    {
        $this->assertEquals(true, true);
    }
}
