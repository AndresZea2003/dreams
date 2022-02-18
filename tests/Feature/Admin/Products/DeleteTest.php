<?php

namespace Admin\Products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAnAdminCanDeleteProducts(): void
    {
        $product = Product::factory()->create();

        $this->actingAs(User::factory()->create()->assignRole('admin'))->delete("api/products/{$product->id}");

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
