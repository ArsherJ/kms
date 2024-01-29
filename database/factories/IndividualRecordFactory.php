<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IndividualRecord>
 */
class IndividualRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_number' => Str::random(10),
            // Example: Generate a random string for the id_number
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->date,
            'height' => $this->faker->numberBetween(150, 200),
            // Example: Generate a random number between 150 and 200 for height
            'weight' => $this->faker->numberBetween(50, 100),
            // Example: Generate a random number between 50 and 100 for weight
            'bmi' => $this->faker->randomFloat(2, 10, 40),
            // Example: Generate a random floating-point number for BMI
            'bmi_category' => $this->faker->randomElement(['Underweight', 'Normal Weight', 'Overweight', 'Obese Class I', 'Obese Class II', 'Obese Class III']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
