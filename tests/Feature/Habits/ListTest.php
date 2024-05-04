<?php

namespace Tests\Feature\Habits;

use Tests\TestCase;
use App\Models\Habit;
use PHPUnit\Framework\Attributes\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListTest extends TestCase
{
    use RefreshDatabase;

    #[Group('habits')]
    #[Group('habits_list')]
    public function test_the_habits_index_view_can_be_render_with_list(): void
    {
        // Arrange
        // ------------------------------------------------
        $habits = Habit::factory(4)->create();
        // ------------------------------------------------

        // Act
        // ------------------------------------------------
        $response = $this->withoutExceptionHandling()->get('/habits');
        // ------------------------------------------------

        // Assert
        // ------------------------------------------------
        $response
            ->assertStatus(200)
            ->assertViewHas('habits', $habits);
        // ------------------------------------------------
    }
}
