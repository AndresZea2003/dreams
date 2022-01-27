<?php

namespace Authentication;

use function route;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testLoginViewIsAccessible()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }
}
