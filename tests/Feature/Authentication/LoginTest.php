<?php

namespace Authentication;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'login';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testLoginViewIsAccessible(): void
    {
        $response = $this->get(self::URL);

        $response->assertOk();
    }
    public function testGuestCannotLogin(): void
    {
        $response = $this->post(self::URL, [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function testAUserCanLogin(): void
    {
        $user = User::factory()->create();

        $response = $this->post(self::URL, [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
