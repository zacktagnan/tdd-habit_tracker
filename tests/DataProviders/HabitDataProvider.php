<?php

namespace Tests\DataProviders;

use App\Models\Habit;

final class HabitDataProvider
{
    public static function provideBadDataProvider(): array
    {
        $habit = Habit::factory()->make();

        return [
            'about name column' => [
                'name',
                [
                    ...$habit->toArray(),
                    'name' => null,
                ],
            ],
            'about times_per_day column' => [
                'times_per_day',
                [
                    ...$habit->toArray(),
                    'times_per_day' => null,
                ],
            ],
        ];
    }
}
