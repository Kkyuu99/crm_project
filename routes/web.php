<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class], 'index');
Route::post('/user/create', [UserController::class, 'create']);
Route::get('/user/show', [UserController::class, 'show']);
Route::patch('/user/edit', [UserController::class, 'edit']);
Route::delete('/user/delete', [UserController::class, 'delete']);

Route::get('/login', [AdminController::class, 'login']);


