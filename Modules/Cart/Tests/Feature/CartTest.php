<?php

namespace Modules\Cart\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Media\Models\Media;
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
     * Test guest user can not add product into cart.
     *
     * @test
     * @return void
     * @throws \Exception
     */
    public function guest_user_can_not_add_product_into_cart()
    {
        $product = Product::factory()->create(['slug' => "rexa" . random_int(1, 50)]);
        $this->get(route('cart.add', ['id' => $product->id]))->assertRedirect();
        $this->assertNull(auth()->user());
    }

    /**
     * Test login user can delete product from cart.
     *
     * @test
     * @return void
     * @throws \Exception
     */
    public function login_user_can_delete_product_from_cart()
    {
        $this->createUserWithLogin();

        $product = Product::factory()->create(['slug' => "rexa" . random_int(1, 50)]);

        $this->get(route('cart.add', ['id' => $product->id]))->assertRedirect();

        $response = $this->get(route('cart.delete', ['id' => $product->id]));
        $response->assertSessionHas('cart');
        $response->assertSessionMissing("cart.$product->id");
        $response->assertRedirect();
    }

    /**
     * Test guest user can not delete product from cart.
     *
     * @test
     * @return void
     * @throws \Exception
     */
    public function guest_user_can_not_delete_product_from_cart()
    {
        $product = Product::factory()->create(['slug' => "rexa" . random_int(1, 50)]);

        $this->get(route('cart.add', ['id' => $product->id]))->assertRedirect();

        $response = $this->get(route('cart.delete', ['id' => $product->id]));
        $response->assertSessionMissing(['cart']);
        $response->assertRedirect();

        $this->assertNull(auth()->user());
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
