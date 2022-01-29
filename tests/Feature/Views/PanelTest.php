<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PanelTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'panel';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAUserCannotSeePanel()
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('user'))->get(self::URL);

        $response->assertStatus(403);
    }
    public function testAAdminCanSeePanel()
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(self::URL);

        $response->assertOk();
    }
    public function testAGuestIsRedirectedToLoginWhenTryingToEnterPanel(): void
    {
        $response = $this->get(self::URL);

        $response->assertStatus(403);
    }
}
