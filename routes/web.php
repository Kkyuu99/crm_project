<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\ResetPasswordController;


// Public Routes
Route::get('/', function () {
    $user = Auth::user();
    return $user && isset($user->role)
        ? redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard')
        : redirect()->route('login');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'get_login'])->name('login')->middleware('guest');
Route::get('/login', [ForgotPasswordController::class, 'get_login']);
Route::get('/login', [ForgotPasswordController::class, 'get_login']);


Route::post('/login', [AuthController::class, 'post_login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [ForgotPasswordController::class, 'get_login'])->name('forgot-password');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
Route::get('/forgot-password', [ForgotPasswordController::class, 'get_login'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'post_forgotpassword'])->name('forgot-password.post');

Route::get('password/reset', [ResetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? response()->json(['message' => 'Reset link sent!'], 200)
        : response()->json(['error' => 'Email not found.'], 400);
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');

    Route::resource('projects', ProjectController::class, [
        'names' => [
            'index' => 'project-list',
            'create' => 'project-create',
            'store' => 'project-store',
            'show' => 'project-detail',
            'edit' => 'project-edit',
            'update' => 'project-update',
            'destroy' => 'project-delete',
        ]
    ]);


Mail::raw('Test email', function ($message) {
    $message->to('your-email@gmail.com')
            ->subject('Testing Mail');
});

    Route::resource('issues', IssueController::class, [
        'names' => [
            'index' => 'issue-list',
            'create' => 'issue-create',
            'store' => 'issue-store',
            'show' => 'issue-detail',
            'edit' => 'issue-edit',
            'update' => 'issue-update',
            'destroy' => 'issue-delete',
        ]
    ]);

    Route::resource('users', UserController::class, [
        'names' => [
            'index' => 'user-list',
            'create' => 'user-register',
            'store' => 'user-store',
            'show' => 'user-detail',
            'edit' => 'user-edit',
            'update' => 'user-update',
            'destroy' => 'user-delete',
        ]
    ]);

    Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('user-profile');
    Route::get('/profile/{id}/edit', [UserProfileController::class, 'edit'])->name('profile-edit');
    Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('profile-update');
});

// User Routes
Route::middleware(['auth', 'role:user'])->prefix('user')->as('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');

    Route::resource('projects', ProjectController::class, [
        'names' => [
            'index' => 'project-list',
            'create' => 'project-create',
            'store' => 'project-store',
            'show' => 'project-detail',
            'edit' => 'project-edit',
            'update' => 'project-update',
            'destroy' => 'project-delete',
        ]
    ]);

    Route::resource('issues', IssueController::class, [
        'names' => [
            'index' => 'issue-list',
            'create' => 'issue-create',
            'store' => 'issue-store',
            'show' => 'issue-detail',
            'edit' => 'issue-edit',
            'update' => 'issue-update',
            'destroy' => 'issue-delete',
        ]
    ]);

    Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('user-profile');
    Route::get('/profile/{id}/edit', [UserProfileController::class, 'edit'])->name('profile-edit');
    Route::put('/profile/{id}', [UserProfileController::class, 'update'])->name('profile-update');
});
