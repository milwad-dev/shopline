<?php

namespace Modules\Category\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
use Modules\Share\Services\ShareService;
use Modules\User\Models\User;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'parent_id' => null,
            'title' => $this->faker->title,
            'slug' => ShareService::makeSlug($this->faker->title),
            'keywords' => $this->faker->text(),
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => fake()->text,
        ];
    }
}
