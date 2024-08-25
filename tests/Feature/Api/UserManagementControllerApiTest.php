<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManagementControllerApiTest extends TestCase
{
    public function test_index_failed()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => ''
        ])->get('api/users');
        $response->assertStatus(422);
        $response->assertJson([
            "message" => "Unauthenticated."
        ]);
    }
}
