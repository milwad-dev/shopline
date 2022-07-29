<?php

namespace Modules\Category\Tests\Feature;

use Modules\User\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test admin user can see list of category.
     *
     * @return void
     */
    public function test_admin_user_can_see_list_of_category()
    {
        $user = User::factory()->create();
        auth()->login($user);

        $response = $this->get(route('categories.index'));
        $response->assertViewIs('Category::Panel.index');
    }
}
