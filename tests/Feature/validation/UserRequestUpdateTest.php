<?php

namespace Tests\Feature\validation;

use App\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserRequestUpdateTest extends TestCase
{
    public function test_authorization()
    {
        $request = new UserRequestUpdate();

        $this->assertTrue($request->authorize());
    }

    public function test_rules()
    {
        $request = new UserRequestUpdate();
        $rules =  $request->rules();

        $this->assertArrayHasKey('name', $rules);
        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);

        $this->assertEquals('required|string', $rules['name']);
        $this->assertEquals('nullable|email:rfc,dns|unique:users,email', $rules['email']);
        $this->assertEquals('nullable|string', $rules['password']);
    }

    public function test_valid_user_request()
    {
        $data = [
            'name' => 'testing',
            'email' => 'testing@gmail.com',
            'password' => '123456',
        ];

        $request = new UserRequestUpdate();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertFalse($validator->fails());
    }

    public function test_invalid_user_request()
    {
        $data = [];

        $request = new UserRequestUpdate();
        $request->replace($data);

        $validator = Validator::make($request->all(), $request->rules());
        $this->assertTrue($validator->fails());
    }
}
