<?php

namespace App\Filament\Resources\Divisions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class DivisionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Divisi')
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Divisi')
                            ->required()
                            ->maxLength(255),
                    ]),
                Section::make('Anggota Divisi')
                    ->components([
                        Repeater::make('members')
                            ->relationship()
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Anggota')
                                    ->required()
                                    ->maxLength(255),
                                FileUpload::make('image')
                                    ->label('Foto Profil')
                                    ->disk('public')
                                    ->directory('struktur-images')
                                    ->required()
                                    ->saveUploadedFileUsing(function ($file) {
                                        // Kompresi WebP Paksa
                                        $manager = new ImageManager(new Driver());
                                        $image = $manager->read($file->getRealPath());
                                        $image->scaleDown(width: 400);
                                        $encoded = $image->toWebp(70);
                                        
                                        $filename = 'struktur-images/' . Str::random(40) . '.webp';
                                        Storage::disk('public')->put($filename, $encoded->toString());
                                        return $filename;
                                    }),
                            ])
                            ->orderColumn('sort_order') // Mengaktifkan drag & drop urutan anggota
                            ->grid(2)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                    ]),
            ]);
    }
}
