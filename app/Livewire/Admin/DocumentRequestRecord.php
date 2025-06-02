<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\DocumentType;
use App\Models\StudentRequest;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class DocumentRequestRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(StudentRequest::query())
            ->columns([
                TextColumn::make('documentType.type')->label('DOCUMENT TYPE'),
                TextColumn::make('student.user.name')->label('STUDENT FULLNAME'),
                TextColumn::make('created_at')->date()->label('REQUESTED DATE'),
                TextColumn::make('claimed_date')->date()->label('DATE CLAIMED'),
                TextColumn::make('status')->label('STATUS')->formatStateUsing(
                    fn($record) => ucfirst($record->status)
                ),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('on-process')->action(
                        fn($record) => $record->update(['status' => 'on-process'])
                    ),
                    Action::make('ready-to-claim')->action(
                        fn($record) => $record->update(['status' => 'ready-to-claim'])
                    ),
                    Action::make('claimed')->color('success')->action(
                        fn($record) => $record->update(['status' => 'claimed', 'claimed_date' => now()])
                    ),
                    Action::make('reject')->color('danger')->action(
                        fn($record) => $record->update(['status' => 'rejected'])
                    ),
                ]),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.document-request-record');
    }
}
