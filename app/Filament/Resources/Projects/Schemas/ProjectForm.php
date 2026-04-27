<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('short_description')
                    ->required(),
                Textarea::make('full_description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('problem_statement')
                    ->columnSpanFull(),
                Textarea::make('solution')
                    ->columnSpanFull(),
                Textarea::make('result')
                    ->columnSpanFull(),
                Textarea::make('tech_stack')
                    ->columnSpanFull(),
                TextInput::make('project_url')
                    ->url(),
                TextInput::make('github_url')
                    ->url(),
                FileUpload::make('featured_image')
                    ->image(),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'])
                    ->default('draft')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('views_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('published_at'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
