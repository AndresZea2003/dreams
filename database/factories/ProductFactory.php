<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomDigitNotZero(),
            'quantity' => $this->faker->randomDigitNotZero(),
            'description' => $this->faker->words(5, true),
        ];
    }
}
