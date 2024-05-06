<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
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
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->withoutExceptionHandling()->delete(route('habits.destroy', $habit));
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response->assertRedirect(route('habits.index'));
        $this->assertDatabaseMissing('habits', [
            'id' => $habit->id,
        ]);
        // ------------------------------------------------
    }
}
