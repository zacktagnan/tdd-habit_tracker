<?php

namespace App\Http\Controllers\Api;

use App\Models\Habit;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabitResource;
use App\Http\Requests\HabitStoreRequest;
use App\Http\Requests\HabitUpdateRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitController extends Controller
{
    public function index(): JsonResource
    {
        return HabitResource::collection(Habit::withCount('executions')->latest()->get());
    }

    public function store(HabitStoreRequest $request): JsonResource
    {
        Habit::create($request->all());
        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function update(HabitUpdateRequest $request, Habit $habit): JsonResource
    {
        $habit->update($request->all());
        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function destroy(Habit $habit): JsonResource
    {
        $habit->delete();
        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function execution(Habit $habit)
    {
        $habit->executions()->create();
    }
}
