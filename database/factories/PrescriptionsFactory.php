<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescriptions>
 */
class PrescriptionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => fake()->imageUrl($width = 640, $height = 480),
            'patients_id' => fake()->numberBetween($min = 1, $max = 50),
            // 'added_at' => fake()->dateTime($max = 'now')
            // 'date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            // 'time' => fake()->time($format = 'H:i:s', $max = 'now'),
        ];
    }
}
