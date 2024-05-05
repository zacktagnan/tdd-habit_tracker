<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;

class CreateTest extends TestCase
{
    #[Group('habits')]
    #[Group('habits_create')]
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
}
