<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->placeholder('Judul acara')
                    ->required(),
                Select::make('level')
                    ->required()
                    ->options([
                        'nasional' => 'Nasional',
                        'provinsi' => 'Provinsi',
                        'kabupaten' => 'Kabupaten',
                        'lokal' => 'Lokal',
                    ]),
                FileUpload::make('banner_image')
                    ->image()
                    ->disk('public')
                    ->maxSize(512)
                    ->directory('agenda-banners'),
                DatePicker::make('start_date')
                    ->helperText('Tanggal mulai pendaftaran acara')
                    ->required(),
                DatePicker::make('end_date')
                    ->helperText('Tanggal selesai pendaftaran acara')
                    ->required(),
                TextInput::make('location')
                    ->placeholder('Contoh: Online / Aula Kampus')
                    ->required(),
                Toggle::make('is_free')
                    ->default(true),
                TextInput::make('price')
                    ->placeholder('Isi jika bukan acara gratis, contoh: 100000')
                    ->numeric(),
                FileUpload::make('qris')
                    ->label('QRIS (jika acara berbayar)')
                    ->image()
                    ->disk('public')
                    ->directory('agenda-qris'),
                TextInput::make('quota')
                    ->placeholder('Contoh: 100')
                    ->numeric()
                    ->required(),
                TextInput::make('link')
                    ->placeholder('Contoh: https://example.com')
                    ->url()
                    ->required(),
            ]);
    }
}
