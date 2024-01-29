<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedingProgram>
 */
class FeedingProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'time_of_program' => $this->faker->time('H:i'),
            'date_of_program' => $this->faker->date,
            'date_posted' => $this->faker->dateTimeThisYear,
            'status' => $this->faker->randomElement(['Draft', 'Published']),
        ];
    }
}
