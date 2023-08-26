<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StaffsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'designation' => fake()->randomElement(['Doctor','Therapist', 'Nurse', 'Janitor']),
            'expertise' => fake()->randomElement(['Massage','Fitness']),
            'contact_num' => fake()->e164phoneNumber(),
            'emer_contact_num' => fake()->e164phoneNumber(),
        ];
    }
}
