<?php

namespace App\Livewire\Admin;

use App\Models\SchoolYear;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SchoolYearRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(SchoolYear::query())
            ->headerActions([
                CreateAction::make('new')
                    ->icon('heroicon-o-plus-circle')
                    ->color('main')
                    ->createAnother(false)
                    ->slideOver()
                    ->form([
                        TextInput::make('name')
                            ->label('School Year')
                            ->placeholder('e.g. 2024-2025')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Set as Active')
                            ->default(false),
                    ])
                    ->modalWidth('xl')
                    ->modalSubheading('Input School Year Information below.')
            ])
            ->columns([
                TextColumn::make('name')->label('SCHOOL YEAR')->searchable(),
                \Filament\Tables\Columns\ToggleColumn::make('is_active')
                    ->label('ACTIVE')
                    ->afterStateUpdated(fn (\Livewire\Component $livewire) => $livewire->dispatch('$refresh')),
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
                        TextInput::make('name')
                            ->label('School Year')
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Set as Active'),
                    ])
                    ->slideOver()
                    ->modalWidth('xl'),
                DeleteAction::make('delete')
                    ->size(ActionSize::ExtraSmall)
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateDescription('Once you add the first School Year, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.school-year-record');
    }
}
