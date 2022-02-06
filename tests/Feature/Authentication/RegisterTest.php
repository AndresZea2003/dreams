<?php

namespace Tests\Feature\Authentication;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'register';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    public function testRegisterViewIsAccessible(): void
    {
        $response = $this->get(self::URL);

        $response->assertStatus(200);
    }
    public function testGuestCanRegister(): void
    {
        $response = $this->post('register', [
            'name' => 'TestUser',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertRedirect(RouteServiceProvider::HOME);
        $this->assertDatabaseHas(
            'users',
            ['name'=>'TestUser', 'email'=>'test@example.com']
        );
    }
}
