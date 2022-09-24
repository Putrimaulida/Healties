<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSeeText("Email");
        $response->assertSeeText("Password");
        $response->assertSee('placeholder="enter your email"', false);
        $response->assertSee('placeholder="enter your password"', false);
    }
}
