<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_export()
    {
        $response = $this->get('/admin/pasien/export');

        $response->assertStatus(302);
    }
}
