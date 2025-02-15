<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/user/dashboard', [UserController::class, 'index']);
Route::get('/user/project-list', [ProjectController::class, 'project_list']);
Route::delete('/project/{project:project_name}/delete', [ProjectController::class, 'delete']);

//Issue user
Route::get('/user/issue-list', [IssueController::class, 'issue_list']);
Route::get('/user/issue-create', [IssueController::class, 'create']);
Route::post('/user/issue-store', [IssueController::class, 'store']);
Route::get('/user/issues/{id}',[IssueController::class,'show']);
Route::put('/user/{id}/issue-edit', [IssueController::class, 'edit'])->name('issue-edit');
Route::post('/user/issues/{id}', [IssueController::class, 'update'])->name('issue-update');
Route::delete('/user/{id}/issue-delete', [IssueController::class, 'delete']);



Route::get('/login', [AuthController::class, 'get_login']);
Route::post('/login', [AuthController::class, 'post_login']);
Route::post('/user/logout', [AuthController::class, 'logout']);

Route::get('/auth/forgot-password', [AuthController::class, 'forgot']);


Route::get('/admin/user/add', [UserController::class, 'create']);
Route::post('/admin/user/store', [UserController::class, 'store']);
Route::get('/admin/user/user-detail', [UserController::class, 'show']);
Route::patch('/user/{user:name}/edit', [UserController::class, 'edit']);
Route::delete('/user/{user:name}/delete', [UserController::class, 'delete']);

