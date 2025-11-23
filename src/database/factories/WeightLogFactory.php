<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-40 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 45, 55),
            'calories' => $this->faker->numberBetween(1000, 2000),
            'exercise_time' => sprintf("%02d:%02d", rand(0,1), rand(0,59)),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
