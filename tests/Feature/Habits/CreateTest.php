<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTest extends TestCase
{
    #[Group('habits')]
    #[Group('habits_create')]
    public function test_habits_can_be_created(): void
    {
        // Arrange
        // ------------------------------------------------
        $habitToStore = [
            'name' => 'test',
            'times_per_day' => 3,
        ];
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->withoutExceptionHandling()->post(route('habits.store'), $habitToStore);
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response->assertRedirect(route('habits.index'));
        $this->assertDatabaseHas('habits', $habitToStore);
        // ------------------------------------------------
    }
}
