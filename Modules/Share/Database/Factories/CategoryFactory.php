<?php

namespace Modules\Share\Database\Factories;

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
    public function definition()
    {
        $title = $this->faker->unique()->title;

        return [
            'parent_id'   => null,
            'user_id'     => User::factory()->create()->id,
            'title'       => $title,
            'slug'        => ShareService::makeSlug($title),
            'keywords'    => $this->faker->text,
            'status'      => CategoryStatusEnum::STATUS_ACTIVE->value,
            'description' => null,
        ];
    }
}
