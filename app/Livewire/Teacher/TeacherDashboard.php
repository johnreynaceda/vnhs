<?php

namespace App\Livewire\Teacher;

use App\Models\Schedule;
use App\Models\SchoolYear;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class TeacherDashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->assignedSchedulesQuery())
            ->columns([
                TextColumn::make('strandSubject.name')->label('SUBJECT'),
                TextColumn::make('section.name')->label('SECTION'),
                // TextColumn::make('teacher.user.name')->label('TEACHER'),
                TextColumn::make('day')->label('DAY'),
                TextColumn::make('room_number')->label('ROOM #'),
                TextColumn::make('start_time')->date('h:i A')->label('START TIME'),
                TextColumn::make('end_time')->date('h:i A')->label('END TIME'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function activeSchoolYear(): ?SchoolYear
    {
        return SchoolYear::active();
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
        return view('livewire.teacher.teacher-dashboard', [
            'activeSchoolYear' => $this->activeSchoolYear(),
        ])->layout('layouts.app');
    }
}
