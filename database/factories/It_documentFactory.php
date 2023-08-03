<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\It_document>
 */
class It_documentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->word(),
            'name' => fake()->word(),
            'document_number' => fake()->unique()->numberBetween(),
            'it_crew_id' =>floor(fake()->unique()->randomFloat(null,1,100)),
            'date_issued' => fake()->date(),
            'date_expiry' => fake()->date(),
            'remarks' => fake()->sentence(),
        ];
    }
}
