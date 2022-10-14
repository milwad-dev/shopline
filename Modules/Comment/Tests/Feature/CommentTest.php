<?php

namespace Modules\Comment\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Comment\Models\Comment;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin user can see comments index page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_comments_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('comments.index'));
        $response->assertViewHas('comments');
        $response->assertViewIs('Comment::index');
    }

    /**
     * Test usual user can not see comments index page.
     *
     * @test
     * @return void
     */
    public function usual_user_can_not_see_comments_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);
        $this->get(route('comments.index'))->assertForbidden();
    }

    /**
     * Test admin user can delete comment.
     *
     * @test
     * @return void
     */
    public function admin_user_can_delete_comment()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $comment = Comment::factory()->create();

        $this->delete(route('comments.destroy', $comment->id))->assertOk();
        $this->assertDatabaseCount('comments', 0);
        $this->assertDatabaseMissing('comments', ['body' => $comment->body]);
        $this->assertEquals(0, Comment::query()->count());
    }

    /**
     * Test usual user can not delete comment.
     *
     * @test
     * @return void
     */
    public function usual_user_can_not_delete_comment()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission(false);

        $comment = Comment::factory()->create();

        $this->delete(route('comments.destroy', $comment->id))->assertForbidden();
        $this->assertDatabaseCount('comments', 1);
        $this->assertDatabaseHas('comments', ['body' => $comment->body]);
        $this->assertEquals(1, Comment::query()->count());
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

        $this->callPermissionSeeder();
        if ($permission) {
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
