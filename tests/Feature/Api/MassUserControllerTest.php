<?php

namespace Tests\Feature\Api;

use App\Jobs\MassBuildUserBody;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use Faker\Factory as Faker;

class MassUserControllerTest extends TestCase
{
    public function test_process()
    {
        Queue::fake();

        // Initialize Faker
        $faker = Faker::create();

        $users = [];
        for ($i = 0; $i < 1000; $i++) {
            $users[] = [
                'name' => "User $i $i a",
                'email' => "user$i$i@example.com",
                'password' => 'password123',
            ];
        }
        $response = $this->post('api/mass-user/body', [
            'users' => $users,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'success create 1000 user'
        ]);

        Queue::assertPushed(MassBuildUserBody::class, function ($job) use ($users) {
            return count($job->users) === 1000;
        });
    }
}
