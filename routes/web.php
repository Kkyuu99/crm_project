<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [UserController::class, 'index']);
// Route::get('/user/add', [UserController::class, 'create']);
// Route::post('/user/store', [UserController::class, 'store']);
// Route::get('/user/show', [UserController::class, 'show']);
// Route::patch('/user/{user:name}/edit', [UserController::class, 'edit']);
// Route::delete('/user/{user:name}/delete', [UserController::class, 'delete']);

Route::get('/', function () {
    return view('admin.user.sidebar');
});

Route::get('/user/create', function () {
    return view('user.new_user');
});
