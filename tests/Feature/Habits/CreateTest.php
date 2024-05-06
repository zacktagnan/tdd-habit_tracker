<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\DataProvider;
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
        $response = $this->withoutExceptionHandling()->post(route('habits.store'), $habitToStore->toArray());
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response->assertRedirect(route('habits.index'));
        $this->assertDatabaseHas('habits', $habitToStore->toArray());
        // ------------------------------------------------
    }

    #[DataProviderExternal(HabitDataProvider::class, 'provideBadDataProvider')]
    public function test_habit_store_validation(string $columnToValidate, array $habit): void
    {
        $response = $this->post(route('habits.store'), $habit);
        $response->assertSessionHasErrors([$columnToValidate]);
    }

    // public static function provideBadDataProvider(): array
    // {
    //     $habit = Habit::factory()->make();

    //     return [
    //         'about name column' => [
    //             'name',
    //             [
    //                 ...$habit->toArray(),
    //                 'name' => null,
    //             ],
    //         ],
    //         'about times_per_day column' => [
    //             'times_per_day',
    //             [
    //                 ...$habit->toArray(),
    //                 'times_per_day' => null,
    //             ],
    //         ],
    //     ];
    // }
}
