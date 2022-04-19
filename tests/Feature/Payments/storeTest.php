<?php

namespace Tests\Feature\Payments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class storeTest extends TestCase
{
    use RefreshDatabase;

     public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
    }

    public function testItStoresANewPayment(): void
    {
        $response = $this->postJson('payments', [
            'reference' => 1789456123,
            'description' => 'Probando input',
            'amount' => 999999,
        ]);

        $this->assertDatabaseHas('payments', [
            'reference' => 1789456123,
            'description' => 'Probando input',
            'amount' => 999999,
        ]);
        $response->assertOk();
    }
}
