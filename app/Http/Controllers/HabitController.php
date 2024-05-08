<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitStoreRequest;
use App\Http\Requests\HabitUpdateRequest;
use App\Models\Habit;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HabitController extends Controller
{
    public function index(): View
    {
        $habits = Habit::all();
        return view('habits.index', compact('habits'));
    }

    // --------------------------------------------------------------
    //  SIGUIENTE(S) no necesario(s) para la parte con Vue en el Frontend
    // --------------------------------------------------------------

    // public function store(HabitStoreRequest $request): RedirectResponse
    // {
    //     Habit::create($request->all());
    //     return redirect()->route('habits.index');
    // }

    // public function update(HabitUpdateRequest $request, Habit $habit): RedirectResponse
    // {
    //     $habit->update($request->all());
    //     return redirect()->route('habits.index');
    // }

    // public function destroy(Habit $habit): RedirectResponse
    // {
    //     $habit->delete();
    //     return redirect()->route('habits.index');
    // }
}
