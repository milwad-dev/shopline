<?php

namespace Modules\Contact\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Contact\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name,
            'email'   => $this->faker->email,
            'phone'   => '09103400042',
            'subject' => $this->faker->title,
            'message' => $this->faker->text,
        ];
    }
}
