<?php

namespace Tests\Feature\Admin\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    public function testItStoresANewProduct(): void
    {
        $this->post('api/products', [
            'name' => 'TestProduct',
            'description' => 'descriptionTest',
            'price' => 1000,
            'quantity' => 12,
        ]);
        $this->assertDatabaseHas(
            'products',
            ['name'=>'TestProduct', 'description'=>'descriptionTest', 'price'=>1000, 'quantity'=>12]
        );
    }
}
