<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_edit()
    {
        $response = $this->get('/admin/ubah_password');

        $response->assertStatus(200);
    }
}
