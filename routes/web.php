<?php

use App\Models\Habit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/habits', function () {
    $habits = Habit::all();
    return view('habits.index', compact('habits'));
});
