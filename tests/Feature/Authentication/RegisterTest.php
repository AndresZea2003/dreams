<?php

namespace Tests\Feature\Authentication;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testRegisterViewIsAccessible()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }
}
