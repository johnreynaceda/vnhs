<?php

namespace App\Livewire\Student;

use App\Models\GradeLevel;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Strand;
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

    public function enrollStudent()
    {
        sleep(2);
        $this->student->update([
            'is_enlisted' => true,
            'grade_level_id' => $this->grade_level_id,
            'strand_id' => $this->strand_id,
            'section_id' => $this->section_id,

        ]);
        sweetalert()->success('Your enrollment is successful. You are now on enlist status');
        return redirect()->route('student.dashboard');
    }



    public function displaySubject()
    {
        if (!$this->grade_level_id || !$this->section_id || !$this->track_id || !$this->strand_id) {
            dd('Please select all fields');
        } else {
            $this->name = GradeLevel::where('id', $this->grade_level_id)->first()->name . ' - ' . Section::where('id', $this->section_id)->first()->name;
            $this->subjects = Schedule::where('section_id', $this->section_id)->get();
        }

    }

    public function render()
    {
        return view('livewire.student.enroll', [
            'tracks' => Track::all(),
            'gradeLevels' => GradeLevel::all(),
            'strands' => Strand::where('grade_level_id', $this->grade_level_id)->where('track_id', $this->track_id)->get(),
            'sections' => Section::where('strand_id', $this->track_id)->get(),
        ])->layout(
                'layouts.app'
            );
    }
}
