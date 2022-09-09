<?php

namespace Modules\Comment\Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Test admin user can see comments index page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_comments_index_page()
    {
        $this->withoutExceptionHandling();
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('comments.index'));
        $response->assertViewHas('comments');
        $response->assertViewIs('Comment::index');
    }

    /**
     * Create user with login & assign permission.
     *
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermissionWithAssignPermission(bool $permission = true)
    {
        $user = User::factory()->create();
        auth()->login($user);

        if ($permission) {
            $this->callPermissionSeeder();
            $user->givePermissionTo(Permission::PERMISSION_COMMENTS);
        }
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
