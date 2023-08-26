<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$region = \App\Models\Region::pluck('id')->toArray();
		$district = \App\Models\District::pluck('id')->toArray();

        return [
	        'first_name' => fake()->firstName(),
	        'middle_name' => null,
	        'last_name' => fake()->lastName(),
	        'email_address' => fake()->unique()->safeEmail(),
	        'telephone' => fake()->phoneNumber(),
	        'sex' => fake()->randomElement(['male', 'female']),
	        'age_range' => fake()->randomElement(['0-17', '18-35', '36-50', '51-65', '66+']),
	        'region_id' => fake()->randomElement($region),
	        'district_id' => fake()->randomElement($district),
	        'stakeholder_type' => fake()->randomElement(['student', 'parent', 'staff', 'public']),
	        'concern' => fake()->randomElement(['complaint', 'feedback', 'grievance', 'recommendation']),
	        'details' => fake()->paragraph(),
	        'response' => null,
	        'is_forwarded' => fake()->boolean(),
	        'times_forwarded' => 0,
	        'attachments' => null,
	        'response_channel' => fake()->randomElement(['email', 'phone', 'whatsapp', 'field_visit']),
	        'is_anonymous' => fake()->boolean(),
	        'status' => fake()->randomElement(['pending', 'resolved', 'closed']),
        ];
    }
}
