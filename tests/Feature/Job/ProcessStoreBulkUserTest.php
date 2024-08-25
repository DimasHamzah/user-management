<?php

namespace Tests\Feature\Job;

use App\Jobs\ProcessStoreBulkUser;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ProcessStoreBulkUserTest extends TestCase
{
    public function test_job_dispatch()
    {
        Queue::fake();

        ProcessStoreBulkUser::dispatch();

        Queue::assertPushed(ProcessStoreBulkUser::class);
    }
}
