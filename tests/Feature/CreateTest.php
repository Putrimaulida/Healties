<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->get('/admin/pasien/create');

        $response->assertStatus(200);
        $response->assertSeeText("");
    }
    protected function CreateTest(): void{

        parent::CreateTest();
        $this->user = $this->CreatTest();
    }
}
