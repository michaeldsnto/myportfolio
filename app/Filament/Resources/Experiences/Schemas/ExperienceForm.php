<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                Select::make('employment_type')
                    ->options([
            'internship' => 'Internship',
            'freelance' => 'Freelance',
            'full_time' => 'Full time',
            'part_time' => 'Part time',
            'contract' => 'Contract',
        ])
                    ->required(),
                TextInput::make('location'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                Toggle::make('is_current')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
