<?php

namespace App\Livewire\Student;

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
use Livewire\Component;

class DocumentRequest extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(StudentRequest::query()->where('student_id', auth()->user()->student->id))->headerActions([
                    CreateAction::make('new')->label('New Requests')->icon('heroicon-o-plus-circle')->color('main')->form([
                        Select::make('document_type')->options(DocumentType::where('is_active', true)->get()->pluck('type', 'id'))
                    ])->modalWidth('xl')->modalSubheading('Input Requested document  below.')->modalHeading('Create Request')->action(
                            function ($data) {
                                StudentRequest::create([
                                    'student_id' => auth()->user()->student->id,
                                    'document_type_id' => $data['document_type'],
                                ]);
                            }
                        )
                ])
            ->columns([
                TextColumn::make('documentType.type')->label('DOCUMENT TYPE'),
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
                // ActionGroup::make([
                //     Action::make('on-process')->action(
                //         fn($record) => $record->update(['status' => 'on-process'])
                //     ),
                //     Action::make('ready-to-claim')->action(
                //         fn($record) => $record->update(['status' => 'ready-to-claim'])
                //     ),
                //     Action::make('claimed')->color('success')->action(
                //         fn($record) => $record->update(['status' => 'claimed', 'claimed_date' => now()])
                //     ),
                //     Action::make('reject')->color('danger')->action(
                //         fn($record) => $record->update(['status' => 'rejected'])
                //     ),
                // ]),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.student.document-request')->layout(
            'layouts.app'
        );
    }
}
