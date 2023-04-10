<?php

namespace Modules\Comment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Enums\CommentStatusEnum;
use Modules\Comment\Models\Comment;
use Modules\Product\Models\Product;
use Modules\User\Models\User;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::factory()->create();

        return [
            'user_id'          => User::factory()->create()->id,
            'commentable_id'   => $product->id,
            'commentable_type' => get_class($product),
            'body'             => $this->faker->text,
            'status'           => CommentStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
