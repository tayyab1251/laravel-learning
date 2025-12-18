<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             // defining fake data for our students table
            'name' => fake()->name('male'),
            'email' => fake()->email(),
            'phone' => '03' . fake()->numerify('#########'),
            'city_id' => fake()->numberBetween(1,3),
        ];
    }
}
