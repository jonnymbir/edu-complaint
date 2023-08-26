<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Division>
 */
class DivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'div_name' => $this->faker->name,
            'div_email' => 'favournwevo@gmail.com',
            'div_contact_person' => $this->faker->name,
            'div_contact_person_telephone' => $this->faker->phoneNumber,
            'div_cc' => $this->faker->randomElement([$this->faker->email, $this->faker->email, null])
        ];
    }
}
