<?php

namespace Tests\Feature\Executions;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;

#[Group('executions')]
#[Group('executions_create')]
class CreateTest extends TestCase
{
    public function test_habit_executions_can_be_created(): void
    {
        // Arrange
        // ------------------------------------------------
        $habitToStore = Habit::factory()->make();
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        // -> petición API
        $this->withoutExceptionHandling()->postJson(route('api-habits.habit-execution.store'), $habitToStore->toArray());
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        // -> petición API
        $this->assertEquals(1, $habitToStore->executions->count());
    }
}
