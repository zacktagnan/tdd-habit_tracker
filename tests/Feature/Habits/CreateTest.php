<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Group;
use Tests\DataProviders\HabitDataProvider;

#[Group('habits')]
#[Group('habits_create')]
class CreateTest extends TestCase
{
    public function test_habits_can_be_created(): void
    {
        // Arrange
        // ------------------------------------------------
        $habitToStore = Habit::factory()->make();
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        // -> petición WEB
        // $response = $this->withoutExceptionHandling()->post(route('habits.store'), $habitToStore->toArray());
        // -> petición API
        $response = $this->withoutExceptionHandling()->postJson(route('api-habits.store'), $habitToStore->toArray());
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // -> petición WEB
        // $response->assertRedirect(route('habits.index'));
        // -> petición API
        $response->assertStatus(200);
        $this->assertDatabaseHas('habits', $habitToStore->toArray());
        // ------------------------------------------------
    }

    #[DataProviderExternal(HabitDataProvider::class, 'provideBadDataProvider')]
    public function test_habit_store_validation(string $columnToValidate, array $habit): void
    {
        // -> petición WEB
        // $response = $this->post(route('habits.store'), $habit);
        // $response->assertSessionHasErrors([$columnToValidate]);
        // -> petición API
        $response = $this->postJson(route('api-habits.store'), $habit);
        $response->assertJsonValidationErrors([$columnToValidate]);
    }
}
