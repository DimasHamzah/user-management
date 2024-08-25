<?php

namespace Tests\Feature\Api;

use App\Jobs\ProcessStoreBulkUser;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class CreateManyUserControllerTest extends TestCase
{
    public function test_process()
    {
        Queue::fake();

        $response = $this->get('api/mass-user');

        Queue::assertPushed(ProcessStoreBulkUser::class);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'success store mass user'
        ]);
    }
}
