<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('category')
                    ->options([
            'backend' => 'Backend',
            'frontend' => 'Frontend',
            'database' => 'Database',
            'devops' => 'Devops',
            'tools' => 'Tools',
            'soft_skills' => 'Soft skills',
        ])
                    ->required(),
                Select::make('proficiency_level')
                    ->options(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'])
                    ->default('intermediate')
                    ->required(),
                TextInput::make('icon'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
