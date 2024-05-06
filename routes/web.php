<?php

use App\Http\Controllers\HabitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/habits', [HabitController::class, 'index'])->name('habits.index');
Route::post('/habits', [HabitController::class, 'store'])->name('habits.store');
Route::put('/habits/{habit}/update', [HabitController::class, 'update'])->name('habits.update');
Route::delete('/habits/{habit}/destroy', [HabitController::class, 'destroy'])->name('habits.destroy');
