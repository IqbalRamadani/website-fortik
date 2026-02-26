<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Pertanyaan')
                    ->schema([
                        TextInput::make('question')
                            ->label('Pertanyaan')
                            ->maxLength(255)
                            ->required(),
                        Textarea::make('answer')
                            ->label('Jawaban')
                            ->required()
                            ->rows(4),
                    ]),
            ]);
    }
}
