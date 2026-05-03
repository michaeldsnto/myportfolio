<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\Schemas\ProjectForm;
use App\Filament\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Generate form and table';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Information')
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Textarea::make('short_description')
                            ->required()
                            ->rows(3)
                            ->maxLength(500),

                        RichEditor::make('full_description')
                            ->required()
                            ->columnSpanFull(),

                        RichEditor::make('problem_statement')
                            ->columnSpanFull(),

                        RichEditor::make('solution')
                            ->columnSpanFull(),

                        RichEditor::make('result')
                            ->columnSpanFull(),

                        Textarea::make('tech_stack')
                            ->helperText('Example: Laravel, MySQL, Tailwind CSS'),

                        TextInput::make('project_url')
                            ->url(),

                        TextInput::make('github_url')
                            ->url(),
                    ])
                    ->columns(2),

                Section::make('Media & Status')
                    ->schema([

                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('projects')
                            ->disk('public'),

                        Select::make('status')
                            ->required()
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ]),

                        Toggle::make('is_featured')
                            ->label('Featured Project'),

                        DateTimePicker::make('published_at'),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('featured_image')
                ->label('Image')
                ->square(),

            TextColumn::make('title')
                ->label('Project Title')
                ->searchable()
                ->sortable()
                ->limit(40),

            TextColumn::make('status')
                ->badge()
                ->sortable(),

            IconColumn::make('is_featured')
                ->label('Featured')
                ->boolean(),

            TextColumn::make('views_count')
                ->label('Views')
                ->sortable(),

            TextColumn::make('published_at')
                ->label('Published At')
                ->dateTime('d M Y H:i')
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Created')
                ->since(),
        ])
        ->filters([
            SelectFilter::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ]),
        ])
        ->actions([
            EditAction::make(),

            DeleteAction::make(),
        ])
        ->bulkActions([
            DeleteBulkAction::make(),
        ])
        ->defaultSort('sort_order', 'asc');
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
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
