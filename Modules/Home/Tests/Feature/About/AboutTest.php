<?php

namespace Modules\Home\Tests\Feature\About;

use Modules\User\Models\User;
use Tests\TestCase;

class AboutTest extends TestCase
{
    /**
     * Test guest user can see about page.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_see_about_page()
    {
        $this->get(route('about-us.home'))
            ->assertViewIs('Home::Pages.about-us.index');
    }

    /**
     * Test login user can see about page.
     *
     * @test
     *
     * @return void
     */
    public function login_user_can_see_about_page()
    {
        auth()->login(User::factory()->create());

        $this->get(route('about-us.home'))
            ->assertViewIs('Home::Pages.about-us.index');
    }
}
