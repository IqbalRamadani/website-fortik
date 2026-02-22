<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
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
                            ->required()
                            ->saveUploadedFileUsing(function ($file) {
                                $manager = new ImageManager(new Driver());
                                
                                // Baca gambar asli
                                $image = $manager->read($file->getRealPath());
                                
                                // Perkecil gambar jika lebarnya lebih dari 800px agar ringan, 
                                // lalu konversi paksa ke WebP dengan kualitas 60%
                                $image->scaleDown(width: 800);
                                $encoded = $image->toWebp(60);
                                
                                // Buat nama file unik
                                $filename = 'album-images/' . Str::random(40) . '.webp';
                                
                                // Tulis file hasil kompresi ke disk public
                                Storage::disk('public')->put($filename, $encoded->toString());
                                
                                // Kembalikan path untuk disimpan di database
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
                                    ->saveUploadedFileUsing(function ($file) {
                                        $manager = new ImageManager(new Driver());
                                        
                                        // Baca gambar asli
                                        $image = $manager->read($file->getRealPath());
                                        
                                        // Perkecil gambar jika lebarnya lebih dari 800px agar ringan, 
                                        // lalu konversi paksa ke WebP dengan kualitas 60%
                                        $image->scaleDown(width: 800);
                                        $encoded = $image->toWebp(60);
                                        
                                        // Buat nama file unik
                                        $filename = 'album-images/' . Str::random(40) . '.webp';
                                        
                                        // Tulis file hasil kompresi ke disk public
                                        Storage::disk('public')->put($filename, $encoded->toString());
                                        
                                        // Kembalikan path untuk disimpan di database
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
