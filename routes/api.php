<?php

use App\Http\Controllers\Api\HabitController as ApiHabitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/habits', [ApiHabitController::class, 'index']);
