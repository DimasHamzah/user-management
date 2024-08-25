<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class MassUserControllerTest extends TestCase
{
    public function test_process()
    {
        Queue::fake();

        $response = $this->get('api/mass-user/body');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'success create 1000 user'
        ]);
    }
}
