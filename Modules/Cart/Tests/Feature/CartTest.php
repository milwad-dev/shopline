<?php

namespace Modules\Cart\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Product\Models\Product;
use Modules\User\Models\User;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login user can add product into cart.
     *
     * @test
     * @return void
     * @throws \Exception
     */
    public function login_user_can_add_product_into_cart()
    {
        $this->createUserWithLogin();

        $product = Product::factory()->create(['slug' => "rexa" . random_int(1, 50)]);
        $response = $this->get(route('cart.add', ['id' => $product->id]));
        $response->assertSessionHas('cart');
        $response->assertRedirect();
    }

    /**
     * Create user with login.
     *
     * @return void
     */
    private function createUserWithLogin()
    {
        auth()->login(User::factory()->create());
    }
}
