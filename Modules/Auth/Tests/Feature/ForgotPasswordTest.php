<?php

namespace Modules\Auth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can see request for confirm email.
     *
     * @return void
     */
    public function test_user_can_see_forgot_page()
    {
        $response = $this->get(route('password.request'));
        $response->assertStatus(200);
    }

    /**
     * Test user can send email for forgot password.
     *
     * @return void
     */
    public function test_email_forgot_password_send_to_user_email()
    {
        $user = User::factory()->create();
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => $user->email])
            ->assertOk();
    }

    /**
     * Test user can't enter email for forgot password with wrong email.
     *
     * @return void
     */
    public function test_user_cannot_enter_email_by_wrong_email()
    {
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => 'milwad.com'])
            ->assertStatus(302);
    }
}
