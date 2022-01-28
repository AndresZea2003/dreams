<?php

namespace Tests\Feature\Authentication;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterViewIsAccessible(): void
    {
        $response = $this->get(route('register'));

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
