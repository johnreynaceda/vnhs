<?php

namespace App\Livewire\Admin;

use App\Models\Student;
use App\Models\User;
use Filament\Forms\Components\TextInput;
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
use Illuminate\Contracts\View\View;
use Livewire\Component;

class StudentRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())->headerActions([
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->slideOver()->form([
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
                Action::make('manage')->button()->outlined()->color('main')->size(ActionSize::ExtraSmall),
                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall),
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
