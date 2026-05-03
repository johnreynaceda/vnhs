<?php

namespace App\Livewire\Teacher;

use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\TeacherModule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AssignedSubjects extends Component
{
    use WithFileUploads;

    public array $subjectFiles = [];

    public function uploadSubjectModule(int $scheduleId): void
    {
        $file = $this->subjectFiles[$scheduleId] ?? null;

        if (! $file) {
            return;
        }

        $schedule = $this->assignedSchedulesQuery()->whereKey($scheduleId)->firstOrFail();
        $path = $file->store('teacher-modules', 'public');

        TeacherModule::create([
            'teacher_id' => $this->teacherId(),
            'school_year_id' => $this->activeSchoolYear()?->id,
            'schedule_id' => $schedule->id,
            'section_id' => $schedule->section_id,
            'strand_subject_id' => $schedule->strand_subject_id,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);

        unset($this->subjectFiles[$scheduleId]);
    }

    public function activeSchoolYear(): ?SchoolYear
    {
        return SchoolYear::active();
    }

    public function assignedSchedules()
    {
        return $this->assignedSchedulesQuery()
            ->with(['section.students.user', 'strandSubject', 'modules'])
            ->get();
    }

    private function assignedSchedulesQuery()
    {
        return Schedule::query()
            ->where('teacher_id', $this->teacherId())
            ->when(
                $this->activeSchoolYear(),
                fn ($query, SchoolYear $schoolYear) => $query->where('school_year_id', $schoolYear->id),
                fn ($query) => $query->whereRaw('1 = 0')
            );
    }

    private function teacherId(): ?int
    {
        return auth()->user()->teacher?->id;
    }

    public function render()
    {
        return view('livewire.teacher.assigned-subjects', [
            'activeSchoolYear' => $this->activeSchoolYear(),
            'assignedSchedules' => $this->assignedSchedules(),
        ])->layout('layouts.app');
    }
}
