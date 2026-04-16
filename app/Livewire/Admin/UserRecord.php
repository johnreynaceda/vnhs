<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->orderBy('created_at', 'desc'))
            ->headerActions([
                CreateAction::make('new')
                    ->icon('heroicon-o-plus-circle')
                    ->color('main')
                    ->slideOver()
                    ->form([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required()->unique(User::class, 'email'),
                        TextInput::make('username')->required()->unique(User::class, 'username'),
                        Select::make('user_type')
                            ->options([
                                'admin' => 'Admin',
                                'teacher' => 'Teacher',
                                'student' => 'Student',
                            ])
                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->required()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    ])
                    ->modalWidth('xl')
                    ->modalSubheading('Input User Information below.')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('username')->label('USERNAME')->searchable(),
                TextColumn::make('user_type')->label('ROLE')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'teacher' => 'warning',
                        'student' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')->label('CREATED')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make('edit')
                    ->color('success')
                    ->size(ActionSize::ExtraSmall)
                    ->form([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required()->unique(User::class, 'email', ignoreRecord: true),
                        TextInput::make('username')->required()->unique(User::class, 'username', ignoreRecord: true),
                        Select::make('user_type')
                            ->options([
                                'admin' => 'Admin',
                                'teacher' => 'Teacher',
                                'student' => 'Student',
                            ])
                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->helperText('Leave empty to keep current password.'),
                    ])
                    ->slideOver()
                    ->modalWidth('xl'),
                DeleteAction::make('delete')
                    ->size(ActionSize::ExtraSmall)
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateDescription('Once you add a User, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.user-record');
    }
}
