<?php

namespace Modules\Product\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;
use Modules\Share\Services\ShareService;
use Modules\User\Models\User;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @throws \Exception
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->title;

        return [
            'first_media_id'    => null,
            'vendor_id'         => User::factory()->create()->id,
            'title'             => $title,
            'slug'              => ShareService::makeSlug($title),
            'sku'               => ShareService::makeUniqueSku(Product::class),
            'price'             => $this->faker->numberBetween(5, 15),
            'count'             => 51,
            'type'              => $this->faker->title,
            'short_description' => $this->faker->text,
            'body'              => $this->faker->text,
            'status'            => ProductStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
