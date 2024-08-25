<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/logout');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Successfully logged out'
        ]);
    }
}
