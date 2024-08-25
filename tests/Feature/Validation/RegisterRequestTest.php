<?php

namespace Tests\Feature\Validation;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RegisterRequestTest extends TestCase
{
    public function test_authorization()
    {
        $request = new RegisterRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules()
    {
        $request = new RegisterRequest();

        $rules = $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);

        $this->assertEquals('required', $rules['name']);
        $this->assertEquals('required|email:rfc,dns|unique:users,email', $rules['email']);
        $this->assertEquals('required', $rules['password']);
    }

    public function test_valid_register()
    {
        $data = [
            'name' => 'testing',
            'email' => 'testing@gmail.com',
            'password' => '123456',
        ];

        $request = new RegisterRequest();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertFalse($validator->fails());
    }

    public function test_invalid_register()
    {
        $data = [
            'name' => 'testing',
        ];
        $request = new RegisterRequest();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertTrue($validator->fails());

    }
}
