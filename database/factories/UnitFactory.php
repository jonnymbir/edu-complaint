<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_name' => $this->faker->name,
			'unit_email' => 'omegakaka1315@gmail.com',
			'unit_contact_person' => $this->faker->name,
			'unit_contact_person_telephone' => $this->faker->phoneNumber,
			'unit_cc' => $this->faker->randomElement([$this->faker->email, $this->faker->email, null])
        ];
    }
}
