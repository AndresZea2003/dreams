<?php

namespace Authentication;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function route;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginViewIsAccessible(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }
    public function testGuestCannotLogin(): void
    {
        $response = $this->post('login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        $response->assertSessionHasErrors(['email']);
    }
    public function testAuthenticatedUsersCanLogin(): void
    {
        $user = User::factory()->create();

        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
//    public function testAnUnverifiedUserIsRedirectedToVerifyEmail()
