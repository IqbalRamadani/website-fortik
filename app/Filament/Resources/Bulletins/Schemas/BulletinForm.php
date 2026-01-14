<?php

namespace App\Filament\Resources\Bulletins\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Set;

class BulletinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                DatePicker::make('published_at')
                    ->required()
                    // ->default(now())
                    ->native(false),
                FileUpload::make('file_path')
                    ->label('Bulletin File (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('bulletins')
                    ->storeFileNamesIn('file_name')
                    ->maxSize(10240)
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Published')
                    ->default(true)
            ]);
    }
}
