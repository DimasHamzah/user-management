<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserManagementController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('log-http')->group(function () {
   Route::post('auth/login', AuthenticationController::class);
   Route::post('register', RegisterController::class);
});

Route::middleware(['auth:sanctum'])->group(function () {
   Route::get('/users', [UserManagementController::class, 'index']);
});
