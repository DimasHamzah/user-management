<?php

namespace Tests\Feature\Api;

use App\Models\User;
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
        $response->assertStatus(401);
        $response->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function test_index_when_token_valid()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('api/users');
        $response->assertStatus(200);
        $response->assertJsonFragment(['message' => 'ok']);
    }
}
