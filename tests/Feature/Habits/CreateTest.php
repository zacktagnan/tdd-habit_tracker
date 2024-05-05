<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;

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

    public function test_habits_cannot_be_created_without_name(): void
    {
        $habitToStore = Habit::factory()->make([
            'name' => null,
        ]);

        $response = $this->post(route('habits.store'), $habitToStore->toArray());
        $response->assertSessionHasErrors(['name']);
    }
}
