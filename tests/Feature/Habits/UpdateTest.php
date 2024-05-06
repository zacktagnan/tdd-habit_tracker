<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\Attributes\Group;
use Tests\DataProviders\HabitDataProvider;

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
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->withoutExceptionHandling()->put(route('habits.update', $habitStored), $habitUpdated);
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response->assertRedirect(route('habits.index'));
        $this->assertDatabaseHas('habits', $habitUpdated);
        // ------------------------------------------------
    }

    #[DataProviderExternal(HabitDataProvider::class, 'provideBadDataProvider')]
    public function test_habit_update_validation(string $columnToValidate, array $habit): void
    {
        $habitStored = Habit::factory()->create();

        $response = $this->put(route('habits.update', $habitStored), $habit);
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
