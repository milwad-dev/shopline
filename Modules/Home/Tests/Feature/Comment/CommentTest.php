<?php

namespace Modules\Home\Tests\Feature\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Comment\Models\Comment;
use Modules\Product\Models\Product;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test guest user can not store comment.
     *
     * @test
     * @return void
     */
    public function guest_user_can_not_store_comment()
    {
        $product = Product::factory()->create();
        $body = $this->faker->text;

        $response = $this->post(route('comments.store'), [
            'body' => $body,
            'commentable_id' => $product->id,
            'commentable_type' => get_class($product),
        ]);
        $response->assertRedirect();
        $response->assertSessionMissing('alert');

        $this->assertDatabaseHas($this->tableName, ['body' => $body]);
        $this->assertDatabaseCount($this->tableName, 0);
        $this->assertEquals(0, Comment::query()->count());
    }
}
