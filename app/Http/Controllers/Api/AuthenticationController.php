<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw new HttpResponseException(response([
                'message' => 'These credentials do not match our records.'
            ], 422));
        }

        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'message' => 'Welcome to my app',
            'data' => $token
        ]);
    }
}
