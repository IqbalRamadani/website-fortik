<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Album')
                    ->components([
                        TextInput::make('title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        FileUpload::make('cover_image')
                            ->image()
                            ->disk('public')
                            ->directory('album-images')
                            ->optimize('webp')
                            ->resize(50)
                            ->required(),
                    ]),

                Section::make('Galeri Foto (Maksimal 12)')
                    ->components([
                        Repeater::make('photos')
                            ->relationship()
                            ->schema([
                                FileUpload::make('image_path')
                                    ->image()
                                    ->disk('public')
                                    ->directory('album-images')
                                    ->optimize('webp')
                                    ->resize(50)
                                    ->required(),
                            ])
                            ->maxItems(12) // Validasi mutlak maksimal 12 foto
                            ->grid(3)
                            ->reorderable(false)
                    ]),
            ]);
    }
}
