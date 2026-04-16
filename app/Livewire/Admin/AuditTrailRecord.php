<?php

namespace App\Livewire\Admin;

use App\Models\AuditTrail;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class AuditTrailRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(AuditTrail::query()->orderBy('created_at', 'desc'))
            ->columns([
                TextColumn::make('user.name')
                    ->label('USER')
                    ->searchable()
                    ->placeholder('System'),
                TextColumn::make('module')
                    ->label('MODULE')
                    ->searchable(),
                TextColumn::make('action')
                    ->label('ACTION')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'create', 'store', 'login' => 'success',
                        'update', 'edit' => 'warning',
                        'delete', 'destroy', 'logout' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('description')
                    ->label('DESCRIPTION')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('ip_address')
                    ->label('IP ADDRESS')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('DATE & TIME')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Read-only, no edit/delete per row usually needed for an audit trail
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateDescription('No audit logs have been recorded yet.');
    }

    public function render()
    {
        return view('livewire.admin.audit-trail-record');
    }
}
