<?php

namespace Modules\Home\Tests\Feature\Cart;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Product\Models\Product;
use Modules\User\Models\User;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guest user can not access to cart view page.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_not_access_to_cart_view_page()
    {
        $this->get(route('carts.home'))
            ->assertViewIs('Home::Pages.carts.index')
            ->assertViewHas('carts');
    }

    /**
     * Test login user can access to cart view page.
     *
     * @test
     *
     * @return void
     */
    public function login_user_can_access_to_cart_view_page()
    {
        auth()->login(User::factory()->create());

        $this->get(route('cart.add', Product::factory()->create()->id)); // Add product into cart

        $this->get(route('carts.home'))
            ->assertViewIs('Home::Pages.carts.index')
            ->assertViewHas('carts')
            ->assertSessionHas('cart');
    }
}
