<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Article\Enums\ArticleStatusEnum;
use Modules\Article\Models\Article;
use Modules\Share\Services\ShareService;
use Modules\User\Models\User;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        $title = $this->faker->title;

        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => ShareService::makeSlug($title),
            'min_read' => random_int(1, 10),
            'body' => $this->faker->text,
            'keywords' => $this->faker->title,
            'description' => $this->faker->text,
            'status' => ArticleStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
