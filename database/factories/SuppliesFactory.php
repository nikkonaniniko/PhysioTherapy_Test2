<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SuppliesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'category' => fake()->randomElement(['Therapy','Cleaning', 'Security']),
            'quantity' => fake()->numberBetween($min = 1, $max = 50),
            'expiration' => fake()->date($format = 'Y-m-d', $min = 'now'),
            'description' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}
