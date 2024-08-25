<?php

namespace Tests\Feature\validation;

use App\Http\Requests\UserRequestStore;
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
}
