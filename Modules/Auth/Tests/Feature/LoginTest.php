<?php

namespace Modules\Auth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can see login page.
     *
     * @return void
     */
    public function test_user_can_see_login_page()
    {
        $response = $this->get(route('login'));
        $response->assertViewIs('Auth::login');
    }

    /**
     * Test logged user can not see login page.
     *
     * @return void
     */
    public function test_logged_user_can_not_see_login_page()
    {
        $user = User::factory()->create();
        auth()->login($user);

        $response = $this->get(route('login'));
        $response->assertOk(); // TODO BETTER
    }

    /**
     * Test login be validate.
     *
     * @return void
     */
    public function test_login_be_validated()
    {
        $response = $this->post(route('login'), []);
        $response->assertSessionHasErrors(['email', 'password']);
        $response->assertRedirect();
    }

    /**
     * Test user can be login with email.
     *
     * @return void
     */
    public function test_user_can_be_login_with_email()
    {
        $user = $this->createUser();
        $response = $this->post(route('login'), [
            'email'    => $user->email,
            'password' => 'Milwad123!',
        ]);

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Test user can be login with email.
     *
     * @return void
     */
    public function test_user_can_be_login_with_phone()
    {
        $user = $this->createUser();
        $response = $this->post(route('login'), [
            'email'    => $user->phone,
            'password' => 'Milwad123!',
        ]);

        $response->assertRedirect(route('home.index'));
    }

    /**
     * Create user with specific password.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    private function createUser()
    {
        return User::factory()->create(['password' => 'Milwad123!']);
    }
}
