<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return response()->json([
            'message' => 'ok',
            'data' => $users
        ]);
    }
}
