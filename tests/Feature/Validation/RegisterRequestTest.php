<?php

namespace Tests\Feature\Validation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterRequestTest extends TestCase
{
    public function test_authorization()
    {
        $request = new RegisterRequest();

        $this->assertTrue($request->authorize());
    }
}
