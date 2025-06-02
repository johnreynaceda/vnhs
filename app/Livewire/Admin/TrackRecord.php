<?php

namespace App\Livewire\Admin;

use App\Models\Track;
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

class TrackRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(Track::query())->headerActions([
                    CreateAction::make('new')->icon('heroicon-o-plus-circle')->color('main')->slideOver()->form([
                        TextInput::make('name')->required(),
                        Textarea::make('description')->required()
                    ])->modalWidth('xl')->modalSubheading('Input Track Informatio below.')
                ])
            ->columns([


                TextColumn::make('name')->label('NAME'),
                TextColumn::make('description')->label('DESCRIPTION'),
            ])
            ->filters([
                // ...
            ])
            ->actions([

                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required()
                ])->slideOver()->modalWidth('xl'),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Track, it will appear here.');
    }


    public function render()
    {
        return view('livewire.admin.track-record');
    }
}
