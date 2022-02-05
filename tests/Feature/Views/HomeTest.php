<?php

namespace Tests\Feature\Views;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    private const URL = RouteServiceProvider::HOME;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testHomeViewIsAccessible(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(self::URL);

        $response->assertOk();
    }
    public function testAUserCanSeeHome(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(self::URL);

        $response->assertOk();
    }
    public function testAdminCanSeeHome(): void
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(self::URL);

        $response->assertOk();
    }
    public function testAGuestIsRedirectedToLoginWhenTryingToEnterHome(): void
    {
        $response = $this->get(self::URL);

        $response->assertRedirect(route('login'));
    }
}
