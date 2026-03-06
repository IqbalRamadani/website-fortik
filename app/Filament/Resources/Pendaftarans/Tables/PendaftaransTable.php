<?php

namespace App\Filament\Resources\Pendaftarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportBulkAction;

class PendaftaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('agenda.title')
                ->label('Nama Agenda')
                ->searchable()
                ->sortable(),
                TextColumn::make('nama_lengkap')
                ->searchable(),
                TextColumn::make('email')
                ->searchable(),
                TextColumn::make('no_whatsapp')
                ->label('No. WhatsApp')
                ->searchable(),
                TextColumn::make('instansi')
                ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->enum([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->badge([
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    ]),
            ])
            ->filters([
                SelectFilter::make('agenda_id')->relationship('agenda', 'title')->label('Filter Agenda'),
                SelectFilter::make('status')->options(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected']),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ]);
    }
}
