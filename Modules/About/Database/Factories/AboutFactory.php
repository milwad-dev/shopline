<?php

namespace Modules\About\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\About\Models\About;

class AboutFactory extends Factory
{
    protected $model = About::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
        ];
    }
}
