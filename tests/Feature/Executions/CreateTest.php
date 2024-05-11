<?php

namespace Tests\Feature\Executions;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;

#[Group('tracker')]
#[Group('executions')]
#[Group('executions_create')]
class CreateTest extends TestCase
{
    public function test_habit_executions_can_be_created(): void
    {
        // Arrange
        // ------------------------------------------------
        $habitToStore = Habit::factory()->create();
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        // -> petición API
        $this->withoutExceptionHandling()->postJson(route('api-habits.habit-execution.store', $habitToStore));
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // -> petición API
        $this->assertEquals(1, $habitToStore->executions->count());
    }
}
