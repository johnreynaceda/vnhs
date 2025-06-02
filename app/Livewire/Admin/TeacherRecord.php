<?php

namespace App\Livewire\Admin;

use App\Models\Teacher;
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

class TeacherRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Teacher::query())->headerActions([
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->slideOver()->form([
                        TextInput::make('teacher_id')->label('Teacher ID')->numeric()->maxLength(12)->required(),
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('mobile_no')->required(),
                        TextInput::make('address')->required(),
                    ])->modalWidth('xl')->modalSubheading('Input Teacher Information in the required fields below')->action(
                            function ($data) {
                                $user = User::create([
                                    'name' => $data['firstname'] . ' ' . $data['lastname'],
                                    'lrn' => $data['teacher_id'],
                                    'username' => strtolower($data['firstname'] . '' . $data['lastname']),
                                    'email' => $data['email'],
                                    'password' => bcrypt('password'),
                                    'user_type' => 'teacher'
                                ]);
                                Teacher::create([
                                    'firstname' => $data['firstname'],
                                    'lastname' => $data['lastname'],
                                    'middlename' => $data['middlename'],
                                    'contact' => $data['mobile_no'],
                                    'address' => $data['address'],
                                    'user_id' => $user->id,
                                ]);


                            }
                        )
                ])
            ->columns([
                TextColumn::make('user.lrn')->label('TEACHER ID'),
                TextColumn::make('user.name')->label('NAME'),
                TextColumn::make('address')->label('ADDRESS'),
                TextColumn::make('user.email')->label('EMAIL'),
                TextColumn::make('contact')->label('MOBILE'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first teacher, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.teacher-record');
    }
}
