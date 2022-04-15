<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->words(2, true),
            'total' => $this->faker->numberBetween(10000, 99999),
            'status' => $this->faker->numberBetween(1, 99),
        ];
    }
}
