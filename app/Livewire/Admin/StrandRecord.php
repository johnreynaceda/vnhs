<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\Track;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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

class StrandRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Strand::query())->headerActions([
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->createAnother(false)->slideOver()->form([
                        TextInput::make('name')->required(),
                        Textarea::make('description')->required(),
                        Select::make('track_id')->label('Track')->options(
                            Track::all()->pluck('name', 'id')
                        ),
                        Select::make('grade_level_id')->label('Grade Level')->options(
                            GradeLevel::all()->pluck('name', 'id')
                        ),

                    ])->modalWidth('xl')->modalSubheading('Input Strand Information below.')
                ])
            ->columns([
                TextColumn::make('name')->label('NAME'),
                TextColumn::make('description')->label('DESCRIPTION'),
                TextColumn::make('track.name')->label('TRACK'),
                TextColumn::make('gradeLevel.name')->label('GRADE LEVEL'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('manage_subjects')->button()->outlined()->color('main')->size(ActionSize::ExtraSmall)->url(fn($record) => route('admin.strand-subject', ['id' => $record->id])),
                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required()
                ])->slideOver()->modalWidth('xl'),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Strand, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.strand-record');
    }
}
