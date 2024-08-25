<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessStoreBulkUser;
use Illuminate\Http\JsonResponse;

class CreateManyUserController extends Controller
{
    public function __invoke(): JsonResponse
    {
        ProcessStoreBulkUser::dispatch();

        return response()->json([
            'message' => 'success store mass user'
        ]);
    }
}
