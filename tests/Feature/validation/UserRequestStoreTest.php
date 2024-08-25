<?php

namespace Tests\Feature\validation;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRequestStoreTest extends TestCase
{
    public function test_authorization()
    {
        $request = new UserRequestStore();

        $this->assertTrue($request->authorize());
    }
}
