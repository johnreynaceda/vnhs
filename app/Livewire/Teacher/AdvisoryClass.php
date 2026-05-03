<?php

namespace App\Livewire\Teacher;

use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\TeacherModule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdvisoryClass extends Component
{
    use WithFileUploads;

    public array $advisoryFiles = [];

    public function uploadAdvisoryModule(int $sectionId): void
    {
        $file = $this->advisoryFiles[$sectionId] ?? null;

        if (! $file) {
            return;
        }

        $section = $this->advisorySections()->firstWhere('id', $sectionId);

        if (! $section) {
            return;
        }

        $path = $file->store('teacher-modules', 'public');

        TeacherModule::create([
            'teacher_id' => $this->teacherId(),
            'school_year_id' => $this->activeSchoolYear()?->id,
            'section_id' => $section->id,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);

        unset($this->advisoryFiles[$sectionId]);
    }

    public function activeSchoolYear(): ?SchoolYear
    {
        return SchoolYear::active();
    }

    public function advisorySections()
    {
        return Section::query()
            ->where('adviser_teacher_id', $this->teacherId())
            ->with(['students.user', 'modules'])
            ->get();
    }

    private function teacherId(): ?int
    {
        return auth()->user()->teacher?->id;
    }

    public function render()
    {
        return view('livewire.teacher.advisory-class', [
            'activeSchoolYear' => $this->activeSchoolYear(),
            'advisorySections' => $this->advisorySections(),
        ])->layout('layouts.app');
    }
}
