<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HabitController extends Controller
{
    public function index(): View
    {
        $habits = Habit::all();
        return view('habits.index', compact('habits'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:habits',
        ]);

        Habit::create($request->all());
        return redirect()->route('habits.index');
    }

    public function update(Request $request, Habit $habit): RedirectResponse
    {
        $habit->update($request->all());
        return redirect()->route('habits.index');
    }
}
