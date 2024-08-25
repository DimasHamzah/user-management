<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    public function test_login_failed()
    {
        $data = [
            'email' => 'email',
            'password' => '',
        ];

        $response = $this->post('/api/auth/login', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email','password']);
        $response->assertJsonFragment([
            'email' => ['The email field must be a valid email address.'],
            'password' => ['The password field is required.']
        ]);
    }

    public function test_login_when_data_empty()
    {

        $response = $this->post('/api/auth/login', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email','password']);
        $response->assertJsonFragment([
            'email' => ['The email field is required.'],
            'password' => ['The password field is required.']
        ]);
    }

    public function test_login_when_email_and_password_not_valid()
    {
        User::factory()->create([
            'password' => Hash::make('Password')
        ]);

        $data = [
            'email' => 'test!asdasd@gmail.com',
            'password' => 'Password',
        ];

        $response = $this->post('/api/auth/login', $data);
        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'These credentials do not match our records.',
        ]);
    }

    public function test_login_success()
    {
        $user = User::factory()->create([
            'password' => Hash::make('Password')
        ]);

        $data = [
            'email' => $user->email,
            'password' => 'Password',
        ];

        $response = $this->post('/api/auth/login', $data);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Welcome to my app',
            'data' => true
        ]);

        $responseData = $response->json();
        $this->assertIsString($responseData['data']);
        $this->assertNotEmpty($responseData['data']);
    }
}
