<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'legal_counsel' => $this->faker->name,
            'dob' => $this->faker->date(format: 'Y-m-d'),
            'profile_date' => $this->faker->date(format: 'Y-m-d'),
            'passport' => NULL,
            'email' => $this->faker->email,
        ];
    }
}
