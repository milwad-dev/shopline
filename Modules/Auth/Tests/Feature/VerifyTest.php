<?php

namespace Modules\Auth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class VerifyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test validate verify code.
     *
     * @return void
     */
    public function test_validate_verify_page()
    {
        $this->createUserWithLogin(['email_verified_at' => null]);

        $response = $this->post(route('verification.notice'), ['verify_code' => '131413']);
        $response->assertRedirect();
    }

    /**
     * Test logged user can see verify page.
     *
     * @return void
     */
    public function test_logged_user_can_see_verify_page()
    {
        $this->createUserWithLogin(['email_verified_at' => null]);

        $response = $this->get(route('verification.notice'));
        $response->assertViewIs('Auth::verify');
    }

    /**
     * Test verified user can't access to verify page.
     *
     * @return void
     */
    public function test_verified_user_cant_acceess_to_verify_page()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('verification.notice'));
        $response->assertRedirect();
    }

    /**
     * Create user with login.
     *
     * @param array|null $attributes
     *
     * @return void
     */
    private function createUserWithLogin(array $attributes = null): void
    {
        $user = User::factory()->create($attributes);
        auth()->login($user);
    }
}
