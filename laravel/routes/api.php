<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']); 
Route::post('/users/create', [UserController::class, 'create']); 
Route::get('/users/{id}', [UserController::class, 'show']); 
Route::post('/users/update/{id}', [UserController::class, 'update']); 
Route::delete('/users/delete/{id}', [UserController::class, 'delete']); 

// Projects
Route::get('/projects', [ProjectController::class, 'index']); 
Route::post('/projects/create', [ProjectController::class, 'create']); 
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects/update/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/delete/{id}', [ProjectController::class, 'delete']);