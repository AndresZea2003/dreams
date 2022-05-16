<?php

namespace Tests\Feature\Admin\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function testItStoresANewProduct(): void
    {
        $response = $this->postJson('api/products', [
            'name' => 'TestProduct',
            'description' => 'descriptionTest',
            'price' => 50000,
            'available' => 12,
        ]);

        $this->assertDatabaseHas(
            'products',
            ['name'=>'TestProduct', 'description'=>'descriptionTest', 'price'=>50000, 'available'=>12]
        );
        $response->assertStatus(201);
    }
}
