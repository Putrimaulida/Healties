<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login()
    {
        //setup
        //do somiting
        $response = $this->get('/');
        //assert
        $response->assertStatus(200);
        $response->assertSeeText("E-mail");
    }
}
