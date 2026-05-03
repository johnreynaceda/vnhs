<?php

namespace App\Livewire\Admin;

use App\Models\Schedule;
use App\Models\Section;
use App\Models\SchoolYear;
use App\Models\StrandSubject;
use App\Models\Teacher;
use Carbon\Carbon;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ScheduleRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public $section_id;
    public $section;
    public function mount()
    {
        $this->section_id = request('id');
        $this->section = Section::find($this->section_id);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Schedule::query()->when($this->section_id, fn ($query) => $query->where('section_id', $this->section_id)))->headerActions([
                    Action::make('back')->label('Back')->url(route('admin.sections'))->color('gray')->icon('heroicon-o-arrow-left'),
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->createAnother(false)->slideOver()->form([
                        TextInput::make('name')->required(),
                        Select::make('strand_subject_id')->label('Subject')->options(
                            StrandSubject::all()->pluck('name', 'id')
                        )->searchable(),
                        Select::make('school_year_id')
                            ->label('School Year')
                            ->options(SchoolYear::pluck('name', 'id'))
                            ->default(fn () => SchoolYear::active()?->id)
                            ->required(),
                        Select::make('section_id')->label('Section')->options(
                            Section::all()->pluck('name', 'id')
                        )
                            ->default($this->section_id)
                            ->searchable(),
                        Select::make('teacher_id')->label('Teacher')->options(
                            Teacher::get()->mapWithKeys(function ($record) {
                                return [$record->id => 'T. ' . $record->user->name];
                            })
                        )->searchable(),
                        TextInput::make('room_number'),
                        Select::make('day')->options([
                            'Monday' => 'Monday',
                            'Tuesday' => 'Tuesday',
                            'Wednesday' => 'Wednesday',
                            'Thursday' => 'Thursday',
                            'Friday' => 'Friday',
                        ]),
                        TimePicker::make('start_time')->withoutSeconds(),
                        TimePicker::make('end_time')->withoutSeconds(),

                    ])->modalWidth('xl')->modalSubheading('Input Schedule Information below.')
                ])
            ->columns([


                TextColumn::make('name')->label('SCHEDULE'),
                TextColumn::make('schoolYear.name')->label('SCHOOL YEAR')->searchable(),
                TextColumn::make('section.name')->label('SECTION'),
                TextColumn::make('strandSubject.name')->label('SUBJECT'),
                TextColumn::make('teacher.user.name')->label('TEACHER'),
                TextColumn::make('room_number')->label('ROOM #'),
                TextColumn::make('day')->label('DAY'),
                TextColumn::make('start_time')->label('TIME')->formatStateUsing(
                    fn($record) => Carbon::parse($record->start_time)->format('h:i A') . ' - ' . Carbon::parse($record->end_time)->format('h:i A')
                ),


            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                        TextInput::make('name')->required(),
                        Select::make('strand_subject_id')
                            ->label('Subject')
                            ->options(StrandSubject::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('school_year_id')
                            ->label('School Year')
                            ->options(SchoolYear::pluck('name', 'id'))
                            ->required(),
                        Select::make('section_id')
                            ->label('Section')
                            ->options(Section::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('teacher_id')
                            ->label('Teacher')
                            ->options(
                                Teacher::get()->mapWithKeys(function ($record) {
                                    return [$record->id => 'T. ' . $record->user->name];
                                })
                            )
                            ->searchable()
                            ->required(),
                        TextInput::make('room_number')->required(),
                        Select::make('day')
                            ->options([
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                            ])
                            ->required(),
                        TimePicker::make('start_time')->withoutSeconds()->required(),
                        TimePicker::make('end_time')->withoutSeconds()->required(),
                    ])->slideOver()->modalWidth('xl'),
                    DeleteAction::make('delete')->size(ActionSize::ExtraSmall)
                ])

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Schedule, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.schedule-record');
    }
}
