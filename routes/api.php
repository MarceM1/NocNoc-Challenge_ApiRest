<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers','middleware' => ['auth:sanctum']], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('comments', CommentController::class);
    Route::apiResource('files', FileController::class);
});




