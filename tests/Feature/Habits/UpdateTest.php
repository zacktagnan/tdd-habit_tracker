<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use Illuminate\Http\Request;
use App\Http\Resources\HabitResource;
use PHPUnit\Framework\Attributes\Group;
use Tests\DataProviders\HabitDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

#[Group('tracker')]
#[Group('habits')]
#[Group('habits_update')]
class UpdateTest extends TestCase
{
    public function test_habits_can_be_updated(): void
    {
        // Arrange
        // ------------------------------------------------
        $habitStored = Habit::factory()->create();
        $habitUpdated = [
            'name' => 'Habit updated',
            'times_per_day' => 9,
        ];
        // -> petición API
        $request = Request::create(route('api-habits.update', $habitStored), 'PUT');
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        // -> petición WEB
        // $response = $this->withoutExceptionHandling()->put(route('habits.update', $habitStored), $habitUpdated);
        // -> petición API
        $response = $this->withoutExceptionHandling()->putJson(route('api-habits.update', $habitStored), $habitUpdated);
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // -> petición API
        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());

        // -> petición WEB
        // $response->assertRedirect(route('habits.index'));
        // $this->assertDatabaseHas('habits', $habitUpdated);
        // -> petición API
        $this->assertDatabaseHas('habits', $habitUpdated);
        $response
            ->assertStatus(200)
            ->assertJson(
                $habitResource->response($request)->getData(true)
            );
        // ------------------------------------------------
    }

    #[DataProviderExternal(HabitDataProvider::class, 'provideBadDataProvider')]
    public function test_habit_update_validation(string $columnToValidate, array $habit): void
    {
        $habitStored = Habit::factory()->create();

        // -> petición WEB
        // $response = $this->put(route('habits.update', $habitStored), $habit);
        // $response->assertSessionHasErrors([$columnToValidate]);
        // -> petición API
        $response = $this->putJson(route('api-habits.update', $habitStored), $habit);
        $response->assertJsonValidationErrors([$columnToValidate]);
    }
}
