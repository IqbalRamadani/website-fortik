<?php

namespace App\Filament\Resources\Submissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportBulkAction;

class SubmissionsTable
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
                TextColumn::make('bukti_file')
                    ->label('Bukti Pendaftaran')
                    ->formatStateUsing(fn ($state) => 'Lihat Bukti')
                    ->url(fn ($state) => $state ? asset('storage/' . $state) : null)
                    ->openUrlInNewTab(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Waktu Daftar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('agenda_id')->relationship('agenda', 'title')->label('Filter Agenda'),
                SelectFilter::make('status')->options(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected']),
            ])
            ->recordActions([
                EditAction::make()
                ->label('Verifikasi'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
