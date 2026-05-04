<?php

namespace App\Livewire\Student;

use App\Models\SchoolYear;
use App\Models\TeacherModule;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class StudentModules extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->modulesQuery())
            ->columns([
                TextColumn::make('file_name')->label('MODULE')->searchable(),
                TextColumn::make('strandSubject.name')->label('SUBJECT')->placeholder('Advisory'),
                TextColumn::make('teacher.user.name')->label('TEACHER'),
                TextColumn::make('created_at')->dateTime('M d, Y h:i A')->label('UPLOADED'),
            ])
            ->actions([
                Action::make('show')
                    ->label('Show')
                    ->icon('heroicon-o-eye')
                    ->url(fn (TeacherModule $record): string => route('student.modules.show', $record))
                    ->openUrlInNewTab(),
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (TeacherModule $record): string => route('student.modules.download', $record)),
            ])
            ->emptyStateHeading('No modules yet')
            ->emptyStateDescription('Modules uploaded by your subject teachers and adviser will appear here.');
    }

    public function activeSchoolYear(): ?SchoolYear
    {
        return SchoolYear::active();
    }

    private function modulesQuery()
    {
        $student = auth()->user()->student;
        $schoolYearId = $student?->school_year_id ?: $this->activeSchoolYear()?->id;

        return TeacherModule::query()
            ->with(['strandSubject', 'teacher.user'])
            ->when(
                $student?->section_id,
                fn ($query) => $query->where('section_id', $student->section_id),
                fn ($query) => $query->whereRaw('1 = 0')
            )
            ->when(
                $schoolYearId,
                fn ($query) => $query->where('school_year_id', $schoolYearId),
                fn ($query) => $query->whereRaw('1 = 0')
            )
            ->latest();
    }

    public function render(): View
    {
        return view('livewire.student.student-modules')->layout('layouts.app');
    }
}
