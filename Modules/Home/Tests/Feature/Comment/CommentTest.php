<?php

namespace Modules\Home\Tests\Feature\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Comment\Models\Comment;
use Modules\Product\Models\Product;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\User\Models\User;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Get table name.
     *
     * @var string
     */
    private string $tableName = 'comments';

    /**
     * Test guest user can not store comment.
     *
     * @test
     *
     * @return void
     */
    public function guest_user_can_not_store_comment()
    {
        $product = Product::factory()->create();
        $body = $this->faker->text;

        $response = $this->post(route('comments.store'), [
            'body'             => $body,
            'commentable_id'   => $product->id,
            'commentable_type' => get_class($product),
        ]);
        $response->assertRedirect();
        $response->assertSessionMissing('alert');

        $this->assertDatabaseMissing($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 0);
        $this->assertEquals(0, Comment::query()->count());
    }

    /**
     * Test login user can store comment.
     *
     * @test
     *
     * @return void
     */
    public function login_user_can_store_comment()
    {
        $this->seed(PermissionSeeder::class);
        auth()->login(User::factory()->create());

        $product = Product::factory()->create();
        $body = $this->faker->text;

        $response = $this->post(route('comments.store'), [
            'body'             => $body,
            'commentable_id'   => (string) $product->id,
            'commentable_type' => get_class($product),
        ]);
        $response->assertRedirect();
        $response->assertSessionHas('alert');

        $this->assertDatabaseHas($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, Comment::query()->count());
    }
}
