<?php

namespace App\Livewire\Teacher;

use App\Models\Schedule;
use App\Models\SchoolYear;
use Livewire\Component;

class AssignedSections extends Component
{
    public function activeSchoolYear(): ?SchoolYear
    {
        return SchoolYear::active();
    }

    public function assignedSections()
    {
        return Schedule::query()
            ->where('teacher_id', $this->teacherId())
            ->when(
                $this->activeSchoolYear(),
                fn ($query, SchoolYear $schoolYear) => $query->where('school_year_id', $schoolYear->id),
                fn ($query) => $query->whereRaw('1 = 0')
            )
            ->with(['section.strand', 'section.students.user'])
            ->get()
            ->pluck('section')
            ->filter()
            ->unique('id')
            ->values();
    }

    private function teacherId(): ?int
    {
        return auth()->user()->teacher?->id;
    }

    public function render()
    {
        return view('livewire.teacher.assigned-sections', [
            'activeSchoolYear' => $this->activeSchoolYear(),
            'assignedSections' => $this->assignedSections(),
        ])->layout('layouts.app');
    }
}
