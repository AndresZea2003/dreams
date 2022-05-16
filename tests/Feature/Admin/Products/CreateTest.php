<?php

namespace Tests\Feature\Admin\Products;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAnAdminCanAccessTheCreationRoute(): void
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(route('admin.products.create'));

        $response->assertOk();
    }
}
