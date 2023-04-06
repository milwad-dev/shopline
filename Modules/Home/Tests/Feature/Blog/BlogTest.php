<?php

namespace Modules\Home\Tests\Feature\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Article\Models\Article;
use Modules\User\Models\User;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guest user can see blog index page.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_see_blog_index_page()
    {
        $this->get(route('blog.home'))
            ->assertViewIs('Home::Pages.blog.index')
            ->assertViewHas(['articles', 'randomArticles', 'categories']);
    }

    /**
     * Test login user can see blog index page.
     *
     * @test
     *
     * @return void
     */
    public function login_user_can_see_blog_index_page()
    {
        auth()->login(User::factory()->create());

        $this->get(route('blog.home'))
            ->assertViewIs('Home::Pages.blog.index')
            ->assertViewHas(['articles', 'randomArticles', 'categories']);
    }

    /**
     * Test guest user can see blog details page.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_see_blog_details_page()
    {
        $this->get(route('blog.details', Article::factory()->create()->slug))
            ->assertViewIs('Home::Pages.blog.details')
            ->assertViewHas(['article', 'randomArticles', 'categories']);
    }

    /**
     * Test login user can see blog details page.
     *
     * @test
     *
     * @return void
     */
    public function login_user_can_see_blog_details_page()
    {
        auth()->login(User::factory()->create());

        $this->get(route('blog.details', Article::factory()->create()->slug))
            ->assertViewIs('Home::Pages.blog.details')
            ->assertViewHas(['article', 'randomArticles', 'categories']);
    }
}
