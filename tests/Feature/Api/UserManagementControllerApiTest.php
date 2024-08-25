<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManagementControllerApiTest extends TestCase
{
    public function test_index_failed()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(404);
    }
}
