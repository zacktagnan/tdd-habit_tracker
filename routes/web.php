<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/habits', function () {
    $habits = new Collection();
    return view('habits.index', compact('habits'));
});
