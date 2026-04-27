<?php

namespace App\Filament\Resources\ResumeFiles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ResumeFileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('version'),
                Toggle::make('is_active')
                    ->required(),
                DateTimePicker::make('uploaded_at'),
            ]);
    }
}
