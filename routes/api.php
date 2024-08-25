<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserManagementController;
use App\Http\Controllers\Api\CreateManyUserController;
use App\Http\Controllers\Api\MassUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('log-http')->group(function () {
   Route::post('auth/login', AuthenticationController::class);
   Route::post('register', RegisterController::class);
});

Route::middleware(['auth:sanctum', 'log-http'])->group(function () {
   Route::get('/users', [UserManagementController::class, 'index']);
   Route::post('/users', [UserManagementController::class, 'store']);
   Route::put('/users/{user}', [UserManagementController::class, 'update']);
   Route::delete('users/{user}', [UserManagementController::class, 'destroy']);
});

Route::get('mass-user', CreateManyUserController::class)->middleware('log-http');
Route::post('mass-user/body', MassUserController::class)->middleware('log-http');
