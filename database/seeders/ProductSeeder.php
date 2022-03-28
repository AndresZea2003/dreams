<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product Base',
            'description' => 'basic product description',
            'price' => 15000,
            'quantity' => 9,
        ]);

        Product::factory(30)->create();
    }
}
