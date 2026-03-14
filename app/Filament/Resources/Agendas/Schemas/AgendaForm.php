<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->placeholder('Judul acara')
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->placeholder('Nasional / Regional / Lokal'),
                FileUpload::make('banner_image')
                    ->image()
                    ->disk('public')
                    ->directory('agenda-banners'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
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
