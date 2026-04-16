<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Student;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class StudentReportRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query()
                ->where('is_enrolled', 1)
            )
            ->columns([
                TextColumn::make('user.lrn')->label('LRN')->searchable(),
                TextColumn::make('user.name')->label('STUDENT NAME')->searchable(),
                TextColumn::make('gradeLevel.name')->label('GRADE LEVEL')->sortable(),
                TextColumn::make('section.name')->label('SECTION')->sortable(),
                TextColumn::make('schoolYear.name')->label('SCHOOL YEAR')->sortable()->badge()->color('success'),
            ])
            ->filters([
                SelectFilter::make('school_year_id')
                    ->label('School Year')
                    ->options(SchoolYear::pluck('name', 'id')),
                SelectFilter::make('grade_level_id')
                    ->label('Grade Level')
                    ->options(GradeLevel::pluck('name', 'id')),
                SelectFilter::make('section_id')
                    ->label('Section')
                    ->options(Section::pluck('name', 'id'))
            ])
            ->headerActions([
                \Filament\Tables\Actions\Action::make('generate_pdf')
                    ->label('Generate PDF Report')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->action(function () {
                        $students = $this->getFilteredTableQuery()->get();
                        
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.student-report', compact('students'))
                            ->setPaper('a4', 'landscape');
                            
                        return response()->streamDownload(fn () => print($pdf->output()), 'Student-Masterlist.pdf');
                    })
            ])
            ->emptyStateDescription('No enrolled students matched your filters.');
    }

    public function render()
    {
        return view('livewire.admin.student-report-record');
    }
}
