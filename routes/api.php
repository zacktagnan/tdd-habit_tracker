<?php

use App\Http\Controllers\Api\HabitController as ApiHabitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/habits', [ApiHabitController::class, 'index'])->name('api-habits.index');
Route::post('/habits', [ApiHabitController::class, 'store'])->name('api-habits.store');
Route::put('/habits/{habit}/update', [ApiHabitController::class, 'update'])->name('api-habits.update');
Route::delete('/habits/{habit}/destroy', [ApiHabitController::class, 'destroy'])->name('api-habits.destroy');
Route::post('/habits/{habit}/execution', [ApiHabitController::class, 'execution'])->name('api-habits.habit-execution.store');
