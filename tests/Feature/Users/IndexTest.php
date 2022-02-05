<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'users';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAnAdminCanSeeTheUsersView(): void
    {
        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->get(self::URL);

        $response->assertOk();
    }
    public function testAnUserCannotSeeTheUsersView(): void
    {
        $response = $this->actingAs(User::factory()->create())->get(self::URL);

        $response->assertStatus(403);
    }
    public function testAnGuestCannotSeeTheUsersView(): void
    {
        $response = $this->get(self::URL);

        $response->assertStatus(302);
    }
    public function testAnAdminCanDeleteUsers(): void
    {
        $user = User::factory()->create();

        $this->actingAs(User::factory()->create()->assignRole('admin'))->delete("users/{$user->id}")->assertRedirect(self::URL);

        $this->assertDatabaseMissing('users',[
            'id' => $user->id
        ]);
    }
    public function testAAdminCanDisableAUser(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->patch("users/{$user->id}/toggle-status");
        $user->refresh();

        $response->assertRedirect(self::URL);
        $this->assertDatabaseHas('users',[
            'disabled_at' => $user->disabled_at
        ]);
    }

}
