<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->weight('bold')
                    ->limit(50),
                TextColumn::make('published_at')
                    ->date('d F Y')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        // Jika kosong, pasti Draft
                        if (is_null($record->published_at)) {
                            return 'Draft';
                        }
                        
                        // Jika tanggalnya di masa depan, berarti Terjadwal
                        if ($record->published_at->isFuture()) {
                            return 'Scheduled';
                        }
                        
                        // Jika hari ini atau di masa lalu, berarti sudah Tayang
                        return 'Published';
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Draft'     => 'warning',
                        'Scheduled' => 'info',
                        'Published' => 'success',
                        default     => 'gray',
                    }),
            ])
            
            ->filters([
                Filter::make('status')
                    ->form([
                        Select::make('status')
                            ->label('Filter Status')
                            ->options([
                                'draft'     => 'Draft (Belum Rilis)',
                                'scheduled' => 'Scheduled (Terjadwal)',
                                'published' => 'Published (Sudah Tayang)',
                            ])
                            ->placeholder('Semua Status'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['status'],
                            function (Builder $query, $status) {
                                return match ($status) {
                                    'draft'     => $query->whereNull('published_at'),
                                    'scheduled' => $query->whereNotNull('published_at')
                                                        ->whereDate('published_at', '>', now()),
                                    'published' => $query->whereNotNull('published_at')
                                                        ->whereDate('published_at', '<=', now()),
                                    default     => $query,
                                };
                            }
                        );
                    })
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                Action::make('publish')
                    ->label('Terbitkan')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->action(fn (Post $record) => $record->update(['published_at' => now()]))
                    ->requiresConfirmation()
                    ->modalHeading('Terbitkan Artikel Ini?')
                    ->modalDescription('Artikel ini akan mengubah status menjadi Published dan langsung tayang ke publik saat ini juga.')
                    ->modalSubmitActionLabel('Ya, Terbitkan')
                    // Logika Kritis: Sembunyikan tombol jika artikel SUDAH tayang
                    ->hidden(fn (Post $record): bool => $record->published_at !== null && $record->published_at <= now()),
                EditAction::make(),
                DeleteAction::make(),   
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}