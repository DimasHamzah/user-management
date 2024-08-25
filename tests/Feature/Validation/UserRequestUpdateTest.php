<?php

namespace Tests\Feature\Validation;

use App\Http\Requests\UserRequestUpdate;
use Tests\TestCase;

class UserRequestUpdateTest extends TestCase
{
    public function test_authorization()
    {
        $request = new UserRequestUpdate();

        $this->assertTrue($request->authorize());
    }


}
