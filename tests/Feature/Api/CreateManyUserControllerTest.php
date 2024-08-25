<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateManyUserControllerTest extends TestCase
{
    public function test_process()
    {
        $response = $this->get('mass-user');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message' => 'success store mass user'
        ]);
    }
}
