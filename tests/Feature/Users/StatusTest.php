<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    public function testAnEnabledUserCannotSeeTheViewUserDisabled(): void
    {
        $user = User::factory()->create(['disabled_at' => null]);

        $response = $this->actingAs($user)->get(route('user-disabled'));

        $response->assertRedirect(route('home'));
    }
    public function testAnDisabledUserIsRedirectedToTheUserDisabledView(): void
    {
        $user = User::factory()->create(['disabled_at' => now()]);

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertRedirect(route('user-disabled'));
    }
    public function testAnDisabledUserCannotSeeHomeView(): void
    {
        $user = User::factory()->create(['disabled_at' => now()]);

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertRedirect(route('user-disabled'));
    }
    public function testAAdminCanDisableAUser(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->patch("users/{$user->id}/toggle-status");
        $user->refresh();

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'disabled_at' => $user->disabled_at,
        ]);
    }
    public function testAAdminCanEnableAUser(): void
    {
        $user = User::factory()->create(['disabled_at' => now()]);

        $response = $this->actingAs(User::factory()->create()->assignRole('admin'))->patch("users/{$user->id}/toggle-status");

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', [
            'disabled_at' => $user->disabled_at,
        ]);
    }
    public function testAnDisabledUserCanSeeTheViewUserDisabled(): void
    {
        $user = User::factory()->create(['disabled_at' => now()]);

        $response = $this->actingAs($user)->get(route('user-disabled'));

        $response->assertOk();
    }
}
