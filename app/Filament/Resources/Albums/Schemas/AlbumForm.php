<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

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
                            ->required()
                            ->saveUploadedFileUsing(function ($file) {
                                $manager = new ImageManager(new Driver());
                                $image = $manager->read($file->getRealPath());
                                $image->scaleDown(width: 800);
                                $encoded = $image->toWebp(50);

                                $filename = 'album-images/' . Str::random(40) . '.webp';
                                $isSaved = Storage::disk('public')->put($filename, $encoded->toString());
                                if (!$isSaved || !Storage::disk('public')->exists($filename)) {
                                    Log::error("Gagal menyimpan gambar: {$filename}");
                                    throw new \Exception("Gagal menyimpan file ke server.");
                                }
                                return $filename;
                            }),
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
                                    ->saveUploadedFileUsing(function ($file) {
                                        $manager = new ImageManager(new Driver());
                                        $image = $manager->read($file->getRealPath());
                                        $image->scaleDown(width: 800);
                                        $encoded = $image->toWebp(50);
                                        
                                        $filename = 'album-images/' . Str::random(40) . '.webp';
                                        $isSaved = Storage::disk('public')->put($filename, $encoded->toString());
                                        if (!$isSaved || !Storage::disk('public')->exists($filename)) {
                                            Log::error("Gagal menyimpan gambar: {$filename}");
                                            throw new \Exception("Gagal menyimpan file ke server.");
                                        }
                                        return $filename;
                                    })
                                    ->required(),
                            ])
                            ->maxItems(12) // Validasi mutlak maksimal 12 foto
                            ->grid(3)
                            ->reorderable(false)
                    ]),
            ]);
    }
}
