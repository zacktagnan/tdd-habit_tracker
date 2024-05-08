<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use Illuminate\Http\Request;
use App\Http\Resources\HabitResource;
use PHPUnit\Framework\Attributes\Group;

#[Group('habits')]
#[Group('habits_delete')]
class DeleteTest extends TestCase
{
    public function test_habits_can_be_deleted(): void
    {
        // Arrange
        // ------------------------------------------------
        $habit = Habit::factory()->create();
        // -> petición API
        $request = Request::create(route('api-habits.destroy', $habit), 'DELETE');
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        // -> petición WEB
        // $response = $this->withoutExceptionHandling()->delete(route('habits.destroy', $habit));
        // -> petición API
        $response = $this->withoutExceptionHandling()->deleteJson(route('api-habits.destroy', $habit));
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // -> petición WEB
        // $response->assertRedirect(route('habits.index'));
        // $this->assertDatabaseMissing('habits', [
        //     'id' => $habit->id,
        // ]);
        // -> petición API
        $this->assertDatabaseMissing('habits', [
            'id' => $habit->id,
        ]);

        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());

        $response
            ->assertStatus(200)
            ->assertJson(
                $habitResource->response($request)->getData(true)
            );
        // ------------------------------------------------
    }
}
