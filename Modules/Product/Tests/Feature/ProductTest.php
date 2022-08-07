<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\User\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index products page.
     *
     * @return void
     */
    public function test_admin_user_can_see_index_products_page()
    {
        $this->withoutExceptionHandling();
        $this->createUserWithLogin();

        $response = $this->get(route('products.index'));
        $response->assertViewIs('Product::index');
    }

    /**
     * Create user with login
     *
     * @return void
     */
    private function createUserWithLogin()
    {
        $user = User::factory()->create();
        auth()->login($user);
    }
}
