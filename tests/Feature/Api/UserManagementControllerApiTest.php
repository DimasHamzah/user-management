<?php

namespace Tests\Feature\Api;

use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

    public function test_post_failed_when_token_invalid()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => ''
        ])->post('/api/users');

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Unauthenticated.'
        ]);
    }

    public function test_post_when_data_invalid()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/users', []);
        $response->assertStatus(302);
    }

    public function test_post_success()
    {
        Mail::fake();

        $user = User::factory()->create();

        $data = [
            'name' => 'testing',
            'email' => fake()->unique()->email,
            'password' => 'Password'
        ];

        $response = $this->actingAs($user)->post('/api/users', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment([
            'message' => 'Success Create User',
            'data' => [
                'name' => $data['name'],
                'email' => $data['email']
            ]
        ]);

        Mail::assertQueued(ConfirmationCreateUser::class, function ($mail) use ($data) {
            return $mail->hasTo($data['email']);
        });
    }
}
