<?php

namespace Tests\Feature\Views;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    private const URL = '/';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testWelcomeViewIsAccessible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testAUserIsRedirectedToHomeWhenTryingToEnterWelcome(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(self::URL);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
