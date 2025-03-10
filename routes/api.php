<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('/posts', [BlogPostController::class, 'store'])->middleware('role:admin,author');
    Route::get('/posts', [BlogPostController::class, 'index']);
    Route::get('/posts/{id}', [BlogPostController::class, 'show']);

    Route::put('/posts/{id}', [BlogPostController::class, 'update'])->middleware('role:admin,author');
    Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->middleware('role:admin,author');
    Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
});
