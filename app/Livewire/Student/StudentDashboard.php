<?php

namespace App\Livewire\Student;

use App\Models\Schedule;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class StudentDashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Schedule::query()->where('section_id', auth()->user()->student->section_id))
            ->columns([
                TextColumn::make('strandSubject.name')->label('SUBJECT'),
                TextColumn::make('section.name')->label('SECTION'),
                TextColumn::make('teacher.user.name')->label('TEACHER'),
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

    public function render()
    {
        return view('livewire.student.student-dashboard')->layout(
            'layouts.app'
        );
    }
}
