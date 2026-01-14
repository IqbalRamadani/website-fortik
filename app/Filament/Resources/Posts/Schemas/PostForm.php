<?php

namespace App\Filament\Resources\Posts\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Set;

class PostForm
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
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Select::make('user_id')
                    ->label('author')
                    ->relationship('author', 'name')
                    ->default(fn () => Auth::id())
                    ->required(),
                DatePicker::make('published_at')
                    ->required()
                    // ->default(now())
                    ->native(false),
                Select::make('status')
                    ->options([
                        'berhasil' => 'Berhasil',
                        'gagal' => 'Gagal',
                    ])
                    ->required()
                    ->default('berhasil'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('post-image')
                    ->maxSize(512)
                    ->imageEditor()
                    ->columnSpanFull(),
            ])->columns(2);
    }
}
