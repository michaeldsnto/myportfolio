<?php

namespace App\Filament\Resources\Experiences;

use App\Filament\Resources\Experiences\Pages\CreateExperience;
use App\Filament\Resources\Experiences\Pages\EditExperience;
use App\Filament\Resources\Experiences\Pages\ListExperiences;
use App\Filament\Resources\Experiences\Schemas\ExperienceForm;
use App\Filament\Resources\Experiences\Tables\ExperiencesTable;
use App\Models\Experience;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $recordTitleAttribute = 'Generete Experience';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Experience Information')
                ->schema([
                    TextInput::make('title')
                        ->required(),

                    TextInput::make('company_name')
                        ->required(),

                    Select::make('employment_type')
                        ->options([
                            'internship' => 'Internship',
                            'freelance' => 'Freelance',
                            'full_time' => 'Full Time',
                            'part_time' => 'Part Time',
                            'contract' => 'Contract',
                            'student' => 'Student',
                        ])
                        ->required(),

                    TextInput::make('location'),

                    Textarea::make('description')
                        ->required()
                        ->rows(5),

                    DatePicker::make('start_date')
                        ->required(),

                    DatePicker::make('end_date'),

                    Toggle::make('is_current')
                        ->default(false),

                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('company_name'),
                TextColumn::make('employment_type')->badge(),
                TextColumn::make('start_date')->date(),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExperiences::route('/'),
            'create' => CreateExperience::route('/create'),
            'edit' => EditExperience::route('/{record}/edit'),
        ];
    }
}
