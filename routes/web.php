<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Sign in
Route::get('/sign-in', [SignInController::class, 'index'])->name('sign-in');
Route::post('/sign-in', [SignInController::class, 'store']);

// Sign out
Route::post('/sign-out', [SignOutController::class, 'store'])->name('sign-out');

// Sign up
Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'store']);

// Dashboard
Route::get('/dashboard', [DashboardController:: class, 'index'])->name('dashboard');

// Students
Route::get('/students', [StudentController:: class, 'index'])->name('students');