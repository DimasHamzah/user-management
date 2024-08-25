<?php

namespace Tests\Feature\Validation;

use App\Http\Requests\Api\LoginRequest;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    public function test_authorization()
    {
        $request = new LoginRequest();

        $this->assertTrue($request->authorize());
    }
}
