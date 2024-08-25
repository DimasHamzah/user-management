<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequestStore;
use App\Http\Requests\UserRequestUpdate;
use App\Mail\ConfirmationCreateUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequestStore $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = new User($validated);
        $user->password = Hash::make($validated['password']);
        $user->save();

        Mail::to($user->email)->send(new ConfirmationCreateUser($user));

        return redirect()->route('user-management.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user_management): View
    {
        return view('users.edit', compact('user_management'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequestUpdate $request, User $user_management): RedirectResponse
    {
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $user_management->password = Hash::make($validated['password']);
        }

        $user_management->update($validated);

        return redirect()->route('user-management.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user_management): RedirectResponse
    {
        $user_management->delete();

        return redirect()->route('user-management.index')->with('success', 'User deleted successfully');
    }
}
