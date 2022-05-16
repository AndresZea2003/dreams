<?php

namespace Tests\Feature\Mocks;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }
    public function testTheExportViewIsAccessibleForAdmin()
    {
        $user = User::factory()->create()->assignRole('admin');
        $response = $this->actingAs($user)->get(route('exports'));
        $response->assertOk();
    }

    public function testExportViewIsNotAccessibleForUser()
    {
        $user = User::factory()->create()->assignRole('user');
        $response = $this->actingAs($user)->get(route('exports'));
        $response->assertStatus(403);
    }
}
