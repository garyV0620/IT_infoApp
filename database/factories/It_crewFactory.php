<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\It_crew>
 */
class It_crewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'education' => fake()->sentence(),
            'contact_details' => fake()->phoneNumber(),
        ];
    }
}
