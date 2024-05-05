<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;

class UpdateTest extends TestCase
{
    #[Group('habits')]
    #[Group('habits_update')]
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
        $this->assertDatabaseHas('habits', $habitStored->toArray());
        // ------------------------------------------------
    }
}
