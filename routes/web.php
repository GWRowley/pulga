<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\CompetitionController;

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

// Forgot your password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');

// Dashboard
Route::get('/dashboard', [DashboardController:: class, 'index'])->name('dashboard');

// Academy
Route::get('/create-academy', [AcademyController:: class, 'create'])->name('create-academy');
Route::post('/create-academy', [AcademyController::class, 'store']);

// Members
Route::get('/members', [MemberController:: class, 'index'])->name('members');
Route::get('/members/profile/{id}', [MemberController::class, 'show']);

Route::get('/members/add-new-member', [MemberController:: class, 'add'])->name('add-new-member');
Route::post('/members/add-new-member', [MemberController::class, 'store']);

Route::get('/members/edit-member/{id}', [MemberController:: class, 'edit'])->name('edit-member');
Route::put('/members/update-member/{id}', [MemberController:: class, 'update'])->name('update-member');
Route::get('/members/delete-member/{id}', [MemberController:: class, 'delete'])->name('delete-member');

// Timetable
Route::get('/timetable', [TimetableController:: class, 'index'])->name('timetable');

// Competitions
Route::get('/competitions', [CompetitionController:: class, 'index'])->name('competitions');
Route::get('/past-competitions', [CompetitionController:: class, 'past'])->name('past-competitions');

Route::get('competitions/add-competition', [CompetitionController:: class, 'add'])->name('add-competition');
Route::post('competitions/add-competition', [CompetitionController::class, 'store']);

Route::get('/competitions/event/{id}', [CompetitionController::class, 'event']);

Route::get('/competitions/edit-event/{id}', [CompetitionController:: class, 'edit'])->name('edit-competition');
Route::put('/competitions/update-event/{id}', [CompetitionController:: class, 'update'])->name('update-competition');
Route::get('/competitions/delete-event/{id}', [CompetitionController:: class, 'delete'])->name('delete-competition');

// Reports - needs controller and adding at top to use