<?php

namespace Tests\Feature\Validation;

use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    public function test_authorization()
    {
        $request = new LoginRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules()
    {
        $request = new LoginRequest();
        $rules = $request->rules();

        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);

        $this->assertEquals('required|email', $rules['email']);
        $this->assertEquals('required', $rules['password']);
    }

    public function test_valid_request()
    {
        $data = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];

        $request = new LoginRequest();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertFalse($validator->fails());
    }


}
