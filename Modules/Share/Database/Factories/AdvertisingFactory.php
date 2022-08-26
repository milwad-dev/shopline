<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Advertising\Enums\AdvertisingLocationEnum;
use Modules\Advertising\Enums\AdvertisingStatusEnum;
use Modules\Advertising\Models\Advertising;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdvertisingFactory extends Factory
{
    protected $model = Advertising::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'   => 1,
            'media_id'  => null,
            'link'      => $this->faker->url,
            'title'     => $this->faker->title,
            'location'  => AdvertisingLocationEnum::LOCATION_BANNER->value,
            'status'    => AdvertisingStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
