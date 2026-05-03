<?php

use App\Models\Schedule;
use App\Models\SchoolYear;

it('syncs existing schedules to the active school year', function () {
    $previousYear = SchoolYear::create([
        'name' => '2025-2026',
        'is_active' => true,
    ]);

    $schedule = Schedule::create([
        'name' => 'Morning Class',
        'strand_subject_id' => 1,
        'section_id' => 1,
        'teacher_id' => 1,
        'day' => 'Monday',
        'room_number' => '101',
        'start_time' => '08:00:00',
        'end_time' => '09:00:00',
    ]);

    expect($schedule->fresh()->school_year_id)->toBe($previousYear->id);

    $activeYear = SchoolYear::create([
        'name' => '2026-2027',
        'is_active' => true,
    ]);

    expect($schedule->fresh()->school_year_id)->toBe($activeYear->id)
        ->and($previousYear->fresh()->is_active)->toBeFalse()
        ->and($activeYear->fresh()->is_active)->toBeTrue();
});

