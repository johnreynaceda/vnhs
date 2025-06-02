<?php

namespace App\Livewire\Admin;

use App\Models\DocumentType;
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
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DocumentTypeRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(DocumentType::query())->headerActions([
                    CreateAction::make('new')
                        ->icon('heroicon-o-plus-circle')
                        ->color('main')
                        ->form([
                            TextInput::make('type')->required(),
                            Toggle::make('is_active')->label('Active')
                        ])
                        ->modalWidth('xl')->modalSubheading('Input Document Information  below.')
                ])
            ->columns([


                TextColumn::make('type')->label('TYPE'),
                ToggleColumn::make('is_active')->label('STATUS')->onColor('success')->onIcon('heroicon-o-check')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                    TextInput::make('type')->required(),
                    Toggle::make('is_active')->label('Active')
                ])->modalWidth('xl'),
                // DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Document, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.document-type-record');
    }
}
