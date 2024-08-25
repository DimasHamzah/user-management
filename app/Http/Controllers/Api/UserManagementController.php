<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestStore;
use App\Http\Requests\UserRequestUpdate;
use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function store(UserRequestStore $store)
    {
        $validated = $store->validated();

        $user = new User($validated);
        $user->password = Hash::make($validated['password']);
        $user->save();

        Mail::to($user->email)->send(new ConfirmationCreateUser($user));

        return response()
            ->json([
                'message' => 'Success Create User',
                'data' => $user->only(['name', 'email'])
            ])
            ->setStatusCode(201);
    }

    public function update(UserRequestUpdate $request, User $user): JsonResponse
    {
        $validated = $request->validated();

        $user->update($validated);

        return response()->json([
            'message' => 'Success Update User',
            'data' => $user->only(['name', 'email'])
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => 'Success Delete User']);
    }
}
