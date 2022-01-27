<?php

namespace Tests\Feature\Views;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function testWelcomeViewIsAccessible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
