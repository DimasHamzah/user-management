<?php

namespace Tests\Feature\Validation;

use App\Http\Requests\UserRequestStore;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserRequestStoreTest extends TestCase
{
    public function test_authorization()
    {
        $request = new UserRequestStore();

        $this->assertTrue($request->authorize());
    }

    public function test_rules()
    {
        $request = new UserRequestStore();

        $rules = $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);

        $this->assertEquals('required|string', $rules['name']);
        $this->assertEquals('required|string|email:rfc,dns|unique:users,email', $rules['email']);
        $this->assertEquals('required|string', $rules['password']);
    }

    public function test_valid_user_request()
    {
        $data = [
            'name' => 'testing',
            'email' => 'testing@gmail.com',
            'password' => '123456',
        ];

        $request = new UserRequestStore();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertFalse($validator->fails());
    }

    public function test_invalid_user_request()
    {
        $data = [];

        $request = new UserRequestStore();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertTrue($validator->fails());
    }
}
