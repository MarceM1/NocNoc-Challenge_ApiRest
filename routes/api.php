<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('api/v1/tasks', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
