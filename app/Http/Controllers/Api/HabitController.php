<?php

namespace App\Http\Controllers\Api;

use App\Models\Habit;
use App\Http\Controllers\Controller;
use App\Http\Resources\HabitResource;
use App\Http\Requests\HabitStoreRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitController extends Controller
{
    public function index(): JsonResource
    {
        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function store(HabitStoreRequest $request): array
    {
        Habit::create($request->all());
        return [];
    }
}
