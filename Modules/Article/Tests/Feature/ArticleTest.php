<?php

namespace Modules\Article\Tests\Feature;

use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * Test admin user can see article index page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_article_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('articles.index'));
        $response->assertViewIs('Article::index');
    }

    /**
     * Create user with login & assign permission.
     *
     * @return void
     */
    private function createUserWithLoginWithAssignPermissionWithAssignPermission()
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        $user->givePermissionTo(Permission::PERMISSION_ARTICLES);
    }

    /**
     * Call permission seeder.
     *
     * @return void
     */
    private function callPermissionSeeder()
    {
        $this->seed(PermissionSeeder::class);
    }
}
