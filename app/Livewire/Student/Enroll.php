<?php

namespace App\Livewire\Student;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Teacher;
use App\Models\Track;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Enroll extends Component implements HasForms
{
    use InteractsWithForms;
    public $student;
    public $subjects;

    public $track_id;
    public $grade_level_id;
    public $strand_id;

    public $section_id;

    public $name;


    public function mount()
    {
        $this->student = Auth::user()->student;
    }

    public function updatedGradeLevelId()
    {
        $this->resetProgramSelection();
    }

    public function updatedTrackId()
    {
        $this->resetProgramSelection();
    }

    public function updatedStrandId()
    {
        $this->section_id = null;
        $this->clearDisplayedSubjects();
    }

    public function updatedSectionId()
    {
        $this->clearDisplayedSubjects();
    }

    private function resetProgramSelection()
    {
        $this->strand_id = null;
        $this->section_id = null;
        $this->clearDisplayedSubjects();
    }

    private function clearDisplayedSubjects()
    {
        $this->subjects = null;
        $this->name = null;
    }

    private function hasCompleteProgramSelection()
    {
        return $this->grade_level_id && $this->grade_level_id !== 'draft'
            && $this->section_id && $this->section_id !== 'draft'
            && $this->track_id && $this->track_id !== 'draft'
            && $this->strand_id && $this->strand_id !== 'draft';
    }

    private function selectedSection()
    {
        if (! $this->hasCompleteProgramSelection()) {
            return null;
        }

        return Section::query()
            ->whereKey($this->section_id)
            ->where('strand_id', $this->strand_id)
            ->whereHas('strand', function ($query) {
                $query->where('grade_level_id', $this->grade_level_id)
                    ->where('track_id', $this->track_id);
            })
            ->with('strand.gradeLevel')
            ->first();
    }

    public function enrollStudent()
    {
        $section = $this->selectedSection();

        if (! $section) {
            sweetalert()->error('Please select a valid grade level, track, strand, and section.');
            return;
        }

        sleep(2);
        $this->student->update([
            'is_enlisted' => true,
            'grade_level_id' => $section->strand->grade_level_id,
            'strand_id' => $section->strand_id,
            'section_id' => $section->id,

        ]);
        sweetalert()->success('Your enrollment is successful. You are now on enlist status');
        return redirect()->route('student.dashboard');
    }



    public function displaySubject()
    {
        if (! $this->hasCompleteProgramSelection()) {
            sweetalert()->error('Please select all program fields to view the subjects.');
            return;
        }

        $section = $this->selectedSection();

        if (! $section) {
            $this->clearDisplayedSubjects();
            sweetalert()->error('The selected section does not match the chosen program.');
            return;
        }

        $this->name = $section->strand->gradeLevel->name . ' - ' . $section->name;
        $this->subjects = StrandSubject::where('strand_id', $section->strand_id)
            ->orderBy('name')
            ->get();
    }

    public function render()
    {
        $hasProgramParent = $this->grade_level_id && $this->grade_level_id !== 'draft'
            && $this->track_id && $this->track_id !== 'draft';

        $strands = $hasProgramParent
            ? Strand::where('grade_level_id', $this->grade_level_id)
                ->where('track_id', $this->track_id)
                ->get()
            : collect();

        $sections = $this->strand_id && $this->strand_id !== 'draft'
            ? Section::where('strand_id', $this->strand_id)->get()
            : collect();

        return view('livewire.student.enroll', [
            'tracks' => Track::all(),
            'gradeLevels' => GradeLevel::all(),
            'strands' => $strands,
            'sections' => $sections,
        ])->layout(
                'layouts.app'
            );
    }
}
