<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Teacher;
use Filament\Forms\Components\Select;
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
use Livewire\Component;

class SectionList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Section::query())->headerActions([
                    CreateAction::make('new')
                        ->icon('heroicon-o-plus-circle')
                        ->color('main')
                        ->createAnother(false)
                        ->slideOver()
                        ->form([
                            TextInput::make('name')->required(),

                            Select::make('grade_level')
                                ->options(GradeLevel::all()->pluck('name', 'id'))
                                ->live(), // Make it reactive

                            Select::make('strand')
                                ->options(
                                    fn($get) =>
                                    Strand::where('grade_level_id', $get('grade_level'))
                                        ->pluck('name', 'id')
                                )
                                ->reactive() // Ensure it updates dynamically
                                ->required(),
                            Select::make('adviser_teacher_id')
                                ->label('Adviser')
                                ->options(
                                    Teacher::get()->mapWithKeys(function ($record) {
                                        return [$record->id => 'T. ' . $record->user->name];
                                    })
                                )
                                ->searchable()
                                ->required(),
                        ])
                        ->modalWidth('xl')->modalSubheading('Input Section Information  below.')->action(function ($data) {
                            Section::create([
                                'name' => $data['name'],
                                'strand_id' => $data['strand'],
                                'adviser_teacher_id' => $data['adviser_teacher_id'],
                            ]);
                        })
                ])
            ->columns([


                TextColumn::make('name')->label('NAME'),
                TextColumn::make('strand.track.name')->label('TRACK'),
                TextColumn::make('strand.name')->label('STRAND'),
                TextColumn::make('strand.gradeLevel.name')->label('GRADE LEVEL'),
                TextColumn::make('adviser.user.name')->label('ADVISER')->placeholder('Not assigned'),


            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('manage_schedule')->button()->outlined()->color('main')->size(ActionSize::ExtraSmall)->url(fn($record) => route('admin.sections-schedule', ['id' => $record->id])),
                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                    TextInput::make('name')->required(),
                    Select::make('adviser_teacher_id')
                        ->label('Adviser')
                        ->options(
                            Teacher::get()->mapWithKeys(function ($record) {
                                return [$record->id => 'T. ' . $record->user->name];
                            })
                        )
                        ->searchable()
                        ->required(),
                ])->slideOver()->modalWidth('xl'),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Section, it will appear here.');
    }


    public function render()
    {
        return view('livewire.admin.section-list');
    }
}
