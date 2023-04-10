<?php

namespace Modules\Slider\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;
use Modules\User\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SliderFactory extends Factory
{
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'   => User::query()->inRandomOrder()->first()->id,
            'media_id'  => null,
            'link'      => $this->faker->title,
            'status'    => SliderStatusEnum::STATUS_ACTIVE->value,
        ];
    }
}
