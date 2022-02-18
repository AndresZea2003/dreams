<?php

namespace Admin\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;
use Tests\TestCase;

class indexTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testAnAdminCanSeeTheAdminProductsView(): void
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(route('admin.products.index'));

        $response->assertOk();
    }
    public function testAnUserCannotSeeTheAdminProductsView(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(route('admin.products.index'));

        $response->assertStatus(403);
    }
    public function testAnGuestCannotSeeTheAdminProductsView(): void
    {
        $response = $this->get(route('admin.products.index'));

        $response->assertStatus(302);
    }
}
