<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/user/dashboard', [UserController::class, 'index']);
Route::get('/user/project-list', [UserController::class, 'project_list']);
Route::get('/user/issue-list', [UserController::class, 'issue_list']);
Route::get('/user/issue-detail', [UserController::class, 'issue_detail']);


Route::get('/user/login', [AuthController::class, 'get_login']);
Route::post('/user/login', [AuthController::class, 'post_login']);
Route::post('/user/logout', [AuthController::class, 'logout']);


Route::get('/admin/user/add', [UserController::class, 'create']);
Route::post('/admin/user/store', [UserController::class, 'store']);
Route::get('/admin/user/user-detail', [UserController::class, 'show']);
Route::patch('/user/{user:name}/edit', [UserController::class, 'edit']);
Route::delete('/user/{user:name}/delete', [UserController::class, 'delete']);

