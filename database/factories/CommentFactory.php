<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'parent_id' => null,
            'comment' => fake()->paragraph(),
	        'user_id' => fake()->randomElement(\App\Models\User::pluck('id')->toArray()),
	        'complaint_id' => fake()->randomElement(\App\Models\Complaint::pluck('id')->toArray()),
	        'attachment' => null,
        ];
    }
}
