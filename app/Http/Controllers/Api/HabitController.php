<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitController extends Controller
{
    public function index(): JsonResource
    {
        return HabitResource::collection(Habit::withCount('executions')->get());
    }
}
