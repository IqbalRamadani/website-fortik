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
                    ->placeholder('Judul berita')
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->placeholder('Slug akan otomatis terisi berdasarkan judul')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Select::make('user_id')
                    ->label('author')
                    ->relationship('author', 'name')
                    ->default(fn () => Auth::id())
                    ->required(),
                DatePicker::make('published_at')
                    ->placeholder('Tanggal publikasi')
                    ->helperText('Biarkan kosong jika ingin menyimpan sebagai Draft.')
                    ->native(false),
                RichEditor::make('content')
                    ->required()
                    ->placeholder('Konten berita')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('post-images')
                    ->visibility('public')
                    ->maxSize(512)
                    ->imageEditor()
                    ->columnSpanFull(),
            ])->columns(2);
    }
}
