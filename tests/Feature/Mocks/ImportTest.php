<?php

namespace Tests\Feature\Mocks;

use App\Exports\ProductsExport;
use App\Imports\ProductImport;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function testAnAdminCanImportAProduct()
    {
        $file = new UploadedFile(base_path("tests\stubs\import.xlsx"), 'import.xlsx');

        $user = User::factory()->create()->assignRole('admin');

        $response = $this->actingAs($user)->post('/imports', [
            'products' => $file,
        ]);

        $response->assertRedirect(route('imports'));

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'name' => "Import",
            'description' => "descript1",
            'price' => 777777,
            'available' => 22,
            'disabled_at' => null,
        ]);
    }

    public function testTheImportViewIsAccessibleForAdmin()
    {
        $user = User::factory()->create()->assignRole('admin');
        $response = $this->actingAs($user)->get(route('imports'));
        $response->assertOk();
    }

    public function testImportViewIsNotAccessibleForUser()
    {
        $user = User::factory()->create()->assignRole('user');
        $response = $this->actingAs($user)->get(route('imports'));
        $response->assertStatus(403);
    }

}
