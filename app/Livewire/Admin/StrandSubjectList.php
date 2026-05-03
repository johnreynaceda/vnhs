<?php

namespace App\Livewire\Admin;

use App\Models\Strand;
use App\Models\StrandSubject;
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

class StrandSubjectList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public $strand_id;
    public $strand;

    public function mount()
    {
        $this->strand_id = request('id');
        $this->strand = Strand::where('id', $this->strand_id)->first();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(StrandSubject::query()->where('strand_id', $this->strand_id))->headerActions([
                    Action::make('back')->label('Back')->url(route('admin.strands'))->color('gray')->icon('heroicon-o-arrow-left'),
                    CreateAction::make('new')->label('New Subject')->icon('heroicon-o-plus-circle')->color('main')->createAnother(false)->form([
                        TextInput::make('name')->required(),
                    ])->modalWidth('xl')->modalSubheading('Input Subject Informatio below.')->action(
                            function ($data) {
                                StrandSubject::create([
                                    'name' => $data['name'],
                                    'strand_id' => $this->strand_id
                                ]);

                            }
                        )
                ])
            ->columns([


                TextColumn::make('name')->label('NAME'),
            ])
            ->filters([
                // ...
            ])
            ->actions([

                EditAction::make('edit')->color('success')->size(ActionSize::ExtraSmall)->form([
                    TextInput::make('name')->required(),
                ])->slideOver()->modalWidth('xl'),
                DeleteAction::make('delete')->size(ActionSize::ExtraSmall)

            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you add first Subject, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.strand-subject-list');
    }
}
