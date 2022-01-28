<?php

namespace Tests\Feature\Views;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testHomeViewIsAccessible()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(302);
    }
}
