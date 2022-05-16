<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->numberBetween(10000, 99999),
            'available' => $this->faker->numberBetween(1, 99),
            'description' => $this->faker->words(5, true),
        ];
    }
}
