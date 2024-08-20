<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TutorialFactory extends Factory
{

    public function definition(): array
    {
        return [
            // 'number' => $this->faker->unique()->numberBetween(1, 10),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
        ];
    }
}
