<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Student;
use App\Models\Strand;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class StudentRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())->headerActions([
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->createAnother(false)->slideOver()->form([
                        TextInput::make('lrn')->label('LRN ')->numeric()->maxLength(12)->required(),
                        \Filament\Forms\Components\Select::make('school_year_id')
                            ->label('School Year')
                            ->options(\App\Models\SchoolYear::pluck('name', 'id'))
                            ->required(),
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('mobile_no')->required(),
                        TextInput::make('address')->required(),
                    ])->modalWidth('xl')->modalSubheading('Input Student Information in the required fields below')->action(
                            function ($data) {
                                $user = User::create([
                                    'name' => $data['firstname'] . ' ' . $data['lastname'],
                                    'lrn' => $data['lrn'],
                                    'username' => strtolower($data['firstname'] . '' . $data['lastname']),
                                    'email' => $data['email'],
                                    'password' => bcrypt('password'),
                                    'user_type' => 'student'
                                ]);

                                Student::create([
                                    'user_id' => $user->id,
                                    'school_year_id' => $data['school_year_id'],
                                    'firstname' => $data['firstname'],
                                    'middlename' => $data['middlename'] ?? '',
                                    'lastname' => $data['lastname'],
                                    'contact' => $data['mobile_no'],
                                    'address' => $data['address'],
                                ]);
                            }
                        )
                ])
            ->columns([
                TextColumn::make('user.lrn')->label('LRN'),
                TextColumn::make('user.name')->label('NAME'),
                TextColumn::make('schoolYear.name')->label('SCHOOL YEAR')->searchable(),
                TextColumn::make('address')->label('ADDRESS')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.email')->label('EMAIL'),
                TextColumn::make('contact')->label('MOBILE'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('manage')
                    ->button()
                    ->outlined()
                    ->color('main')
                    ->size(ActionSize::ExtraSmall)
                    ->slideOver()
                    ->modalWidth('xl')
                    ->modalSubheading('Manage the student academic assignment and enrollment status.')
                    ->fillForm(fn (Student $record): array => [
                        'school_year_id' => $record->school_year_id,
                        'grade_level_id' => $record->grade_level_id,
                        'strand_id' => $record->strand_id,
                        'section_id' => $record->section_id,
                        'is_enlisted' => $record->is_enlisted,
                        'is_enrolled' => $record->is_enrolled,
                    ])
                    ->form([
                        Select::make('school_year_id')
                            ->label('School Year')
                            ->options(SchoolYear::pluck('name', 'id'))
                            ->required(),
                        Select::make('grade_level_id')
                            ->label('Grade Level')
                            ->options(GradeLevel::pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function ($set) {
                                $set('strand_id', null);
                                $set('section_id', null);
                            })
                            ->required(),
                        Select::make('strand_id')
                            ->label('Strand')
                            ->options(fn ($get) => $get('grade_level_id')
                                ? Strand::where('grade_level_id', $get('grade_level_id'))->pluck('name', 'id')
                                : [])
                            ->live()
                            ->afterStateUpdated(fn ($set) => $set('section_id', null))
                            ->required(),
                        Select::make('section_id')
                            ->label('Section')
                            ->options(fn ($get) => $get('strand_id')
                                ? Section::where('strand_id', $get('strand_id'))->pluck('name', 'id')
                                : [])
                            ->required(),
                        Toggle::make('is_enlisted')
                            ->label('Enlisted'),
                        Toggle::make('is_enrolled')
                            ->label('Enrolled'),
                    ])
                    ->action(function (Student $record, array $data): void {
                        if ($data['is_enrolled']) {
                            $data['is_enlisted'] = true;
                        }

                        $record->update($data);
                    }),
                EditAction::make('edit')
                    ->color('success')
                    ->size(ActionSize::ExtraSmall)
                    ->slideOver()
                    ->modalWidth('xl')
                    ->modalSubheading('Update student personal and account information.')
                    ->fillForm(fn (Student $record): array => [
                        'lrn' => $record->user?->lrn,
                        'firstname' => $record->firstname,
                        'middlename' => $record->middlename,
                        'lastname' => $record->lastname,
                        'email' => $record->user?->email,
                        'mobile_no' => $record->contact,
                        'address' => $record->address,
                    ])
                    ->form([
                        TextInput::make('lrn')->label('LRN')->numeric()->maxLength(12)->required(),
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('mobile_no')->required(),
                        TextInput::make('address')->required(),
                    ])
                    ->action(function (Student $record, array $data): void {
                        $record->user->update([
                            'name' => $data['firstname'] . ' ' . $data['lastname'],
                            'lrn' => $data['lrn'],
                            'email' => $data['email'],
                        ]);

                        $record->update([
                            'firstname' => $data['firstname'],
                            'middlename' => $data['middlename'] ?? '',
                            'lastname' => $data['lastname'],
                            'contact' => $data['mobile_no'],
                            'address' => $data['address'],
                        ]);
                    }),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first student, it will appear here.');
    }

    public function approveStudent($student_id)
    {
        $student = Student::where('id', $student_id)->first();
        $student->update([
            'is_enrolled' => 1,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.student-record', [
            'enlists' => Student::where('is_enlisted', 1)->where('is_enrolled', 0)->get(),
            'enrolleds' => Student::where('is_enrolled', 1)->get(),
        ]);
    }
}
