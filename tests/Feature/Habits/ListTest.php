<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use App\Http\Resources\HabitResource;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Group;

#[Group('habits')]
#[Group('habits_list')]
class ListTest extends TestCase
{
    public function test_habits_index_view_can_be_render_with_list(): void
    {
        // Arrange
        // ------------------------------------------------
        // $habits = Habit::factory(4)->create();
        // NO NECESARIO con el HabitResource
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->withoutExceptionHandling()->get(route('habits.index'));
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response
            ->assertStatus(200);
        // ->assertViewHas('habits', $habits);
        // NO NECESARIO con el HabitResource
        // ------------------------------------------------
    }

    public function test_habits_list_is_fetched(): void
    {
        // Arrange
        // ------------------------------------------------
        Habit::factory(4)->create();
        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());
        $request = Request::create(route('api-habits.index'), 'GET');
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->getJson(route('api-habits.index'));
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // dd($habitResource->response($request)->getData(true));
        $response
            ->assertStatus(200)
            ->assertJson(
                $habitResource->response($request)->getData(true)
            );
        // ->assertViewHas('habits', $habits);
        // NO NECESARIO con el HabitResource
        // ------------------------------------------------
    }
}
