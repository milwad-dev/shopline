<?php

namespace Modules\Auth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can see register page.
     *
     */
    public function test_user_can_see_register_page()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
    }

    /**
     * Test validate be successful.
     *
     * @return void
     */
    public function test_validate_register()
    {
        $response = $this->post(route('register'), []);

        $response->assertRedirect();
    }

    /**
     * Test user can register.
     *
     */
    public function test_user_can_register()
    {
        $response = $this->post(route('register'), [
            'name' => 'milwad',
            'email' => 'milwad@gmail.com',
            'phone' => '09103400042',
            'type' => 'customer',
            'password' => 'Milad123!',
            'policy' => '1'
        ]);

        $response->assertRedirect(route('home.index'));
        $this->assertCount(1, User::all());
    }
}
