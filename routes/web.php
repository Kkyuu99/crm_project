<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/user/dashboard', [UserController::class, 'index']);
Route::get('/user/project_list', [ProjectController::class, 'project_list']);
Route::get('/user/issue_list', [IssueController::class, 'issue_list']);
Route::get('/user/user_list', [UserController::class, 'user_list']);
Route::get('/user/issue-create', [IssueController::class, 'create']);


Route::get('/admin/user/add', [UserController::class, 'create']);
Route::post('/admin/user/store', [UserController::class, 'store']);
Route::get('/admin/user/user-detail', [UserController::class, 'show']);
Route::patch('/user/{user:name}/edit', [UserController::class, 'edit']);
Route::delete('/user/{user:name}/delete', [UserController::class, 'delete']);

