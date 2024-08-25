<?php

namespace Tests\Feature\Job;

use App\Jobs\MassBuildUserBody;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use Faker\Factory as Faker;


class MassBulkUserBodyTest extends TestCase
{
    public function test_job_dispatch_body()
    {
        Queue::fake();

        $faker = Faker::create();

        $users = [];
        for ($i = 0; $i < 1000; $i++) {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => 'password123',
            ];
        }

        MassBuildUserBody::dispatch($users);


        Queue::assertPushed(MassBuildUserBody::class);
    }
}
