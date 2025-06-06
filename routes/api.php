<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseAuthController;

Route::post('/firebase/login', [FirebaseAuthController::class, 'login'])->name('firebase.login');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\Api\AnimalController;

Route::apiResource('animais', AnimalController::class);
