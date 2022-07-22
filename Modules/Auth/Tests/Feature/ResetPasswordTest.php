<?php

namespace Modules\Auth\Tests\Feature;

use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    /**
     * Test user can't try to send email more than 5 chance.
     *
     * @return void
     */
    public function test_user_banned_after_6_attempt_to_reset_password()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post(route('password.checkVerifyCode'), ['verify_code', 'email' => 'milwad@gmail.com'])
                ->assertStatus(302);
        }

        $this->post(route('password.checkVerifyCode'), ['verify_code', 'email' => 'milwad@gmail.com'])
            ->assertStatus(429);
    }
}
