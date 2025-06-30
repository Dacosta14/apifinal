<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/login', function () {
    return view('login'); // sua view de login
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::resource('perfil', PerfilController::class)->middleware('auth');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dashboard', function () {
    return 'Bem-vindo ao dashboard!';
})->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('animais', AnimalController::class);
Route::resource('perfil', PerfilController::class);

