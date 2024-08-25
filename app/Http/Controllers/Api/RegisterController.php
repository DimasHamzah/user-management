<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = new User($validated);
        $user->password = Hash::make($validated['password']);
        $user->save();

        Mail::to($user->email)->send(new ConfirmationCreateUser($user));

        return response()
            ->json([
                'message' => 'User register successfully',
                'data' => $user->only(['name', 'email'])
            ])
            ->setStatusCode(201);
    }
}
