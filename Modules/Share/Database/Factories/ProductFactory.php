<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Models\Category;
use Modules\Media\Models\Media;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;
use Modules\Share\Services\ShareService;

class ProductFactory extends Factory
{
    protected $model = Product::class;

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
            'first_media_id' => null,
            'second_media_id' => null,
            'vendor_id' => auth()->id(),
            'title' => $title,
            'slug' => ShareService::makeSlug($title),
            'sku' => ShareService::makeUniqueSku(Product::class),
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
