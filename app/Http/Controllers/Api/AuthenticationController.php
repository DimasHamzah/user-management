<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();
    }
}
