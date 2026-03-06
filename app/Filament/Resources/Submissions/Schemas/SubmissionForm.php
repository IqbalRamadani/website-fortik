<?php

namespace App\Filament\Resources\Submissions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Peserta')
                    ->description('Data diri yang diinputkan oleh pendaftar (Hanya Baca)')
                    ->schema([
                        TextInput::make('nama_lengkap')->label('Nama Lengkap')->disabled(),
                        TextInput::make('email')->label('Email')->disabled(),
                        TextInput::make('no_whatsapp')->label('No. WhatsApp')->disabled(),
                        TextInput::make('instansi')->label('Instansi')->disabled(),
                    ])->columns(2),
                Section::make('Verifikasi Berkas & Status')
                    ->schema([
                        FileUpload::make('bukti_pendaftaran')
                            ->label('Bukti Pendaftaran')
                            ->disk('public')
                            ->directory('bukti-pendaftaran')
                            ->downloadable()
                            ->openable()
                            ->disabled()
                            ->columnSpanFull(),
                        Select::make('status')
                            ->label('Status Pendaftaran')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->required()
                            ->native(false),
                            // ->color(fn ($state) => match ($state) {
                            //     'pending' => 'warning',
                            //     'approved' => 'success',
                            //     'rejected' => 'danger',
                            //     default => 'gray',
                            // }),
                    ])->columns(1),
            ]);
    }
}
