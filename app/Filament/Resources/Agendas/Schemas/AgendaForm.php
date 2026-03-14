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
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->default('Nasional'),
                FileUpload::make('banner_image')
                    ->image()
                    ->disk('public')
                    ->directory('agenda-banners'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Toggle::make('is_free')
                    ->default(true),
                TextInput::make('price')
                    ->numeric(),
                FileUpload::make('qris')
                    ->image()
                    ->disk('public')
                    ->directory('agenda-qris'),
                TextInput::make('quota')
                    ->numeric()
                    ->required(),
                TextInput::make('link')
                    ->url(),
            ]);
    }
}
