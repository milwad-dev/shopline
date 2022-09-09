<?php

namespace Modules\Home\Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Test can see home page.
     *
     * @return void
     */
    public function test_can_see_home_page()
    {
        $response = $this->get(route('home.index'));
        $response->assertViewIs('Home::Pages.home.index');
        $response->assertViewHas('homeRepo');
    }
}
