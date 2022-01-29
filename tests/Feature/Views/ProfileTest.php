<?php

namespace Tests\Feature\Views;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'profile';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAUserCanSeeProfile()
    {
        $response = $this->actingAs(User::factory()->create())->get(self::URL);

        $response->assertOk();
    }
    public function testAAdminCanSeeProfile()
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(self::URL);

        $response->assertOk();
    }
    public function testAGuestIsRedirectedToLoginWhenTryingToEnterProfile(): void
    {
        $response = $this->get(self::URL);

        $response->assertRedirect(route('login'));
    }
}
