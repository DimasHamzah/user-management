<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
