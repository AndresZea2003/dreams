<?php

namespace Tests\Feature\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testAnAdminCanSeeTheProductsView(): void
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(route('products.index'));

        $response->assertOk();
    }
    public function testAnUserCantSeeTheProductsView(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(route('products.index'));

        $response->assertStatus(200);
    }
    public function testAnGuestCannotSeeTheProductsView(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(302);
    }
}
