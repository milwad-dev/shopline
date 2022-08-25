<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
use Modules\Share\Services\ShareService;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->title;

        return [
            'parent_id' => null,
            'title' => $title,
            'slug' => ShareService::makeSlug($title),
            'keywords' => $this->faker->text,
            'status' => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => null,
            'user_id' => 1,
        ];
    }
}
