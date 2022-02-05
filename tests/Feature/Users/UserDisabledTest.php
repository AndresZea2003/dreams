<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDisabledTest extends TestCase
{
    use RefreshDatabase;

    private const URL = 'user-disabled';

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
   public function testAnEnabledUserCannotSeeTheViewUserDisabled(): void
    {
        $user = User::factory()->create(['disabled_at' => null,]);

        $response = $this->actingAs($user)->get(self::URL);

        $response->assertRedirect(route('home'));
    }
    public function testAnDisabledUserIsRedirectedToTheUserDisabledView(): void
    {
        $user = User::factory()->create();
        $this->actingAs(User::factory()->create()->assignRole('admin'))->patch("users/{$user->id}/toggle-status");

        $user->refresh();
        $response = $this->actingAs($user)->get(route('home'));

        $response->assertRedirect(self::URL);
    }
}
