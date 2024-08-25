<?php

namespace Tests\Feature\Api;

use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    public function test_register_failed()
    {
        $data = [
            'name' => '',
            'email' => '',
            'password' => '',
        ];

        $response = $this->post('/api/register', $data);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            'name' => ['The name field is required.'],
            'email' => ['The email field is required.'],
            'password' => ['The password field is required.']
        ]);
    }

    public function test_when_data_empty()
    {
        $response = $this->post('/api/register', []);
        $response->assertStatus(422);
        $response->assertJsonFragment([
            'name' => ['The name field is required.'],
            'email' => ['The email field is required.'],
            'password' => ['The password field is required.']
        ]);
    }

    public function test_email_when_duplicated()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'new user',
            'email' => $user->email,
            'password' => 'Password'
        ];

        $response = $this->json('POST', '/api/register', $data);

        $response->assertStatus(422);
    }

    public function test_register_success()
    {
        Mail::fake();

        $user = [
            'name' => 'new user',
            'email' => fake()->unique()->email,
            'password' => 'Password'
        ];

        $response = $this->post('/api/register', $user);
        $response->assertStatus(201);
        $response->assertJson([
            'message' => 'User register successfully',
            'data' => [
                'name' => $user['name'],
                'email' => $user['email']
            ]
        ]);

        Mail::assertQueued(ConfirmationCreateUser::class, function ($mail) use ($user) {
            return $mail->hasTo($user['email']);
        });
    }
}
