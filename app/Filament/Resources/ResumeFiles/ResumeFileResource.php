<?php

namespace App\Filament\Resources\ResumeFiles;

use App\Filament\Resources\ResumeFiles\Pages\CreateResumeFile;
use App\Filament\Resources\ResumeFiles\Pages\EditResumeFile;
use App\Filament\Resources\ResumeFiles\Pages\ListResumeFiles;
use App\Filament\Resources\ResumeFiles\Schemas\ResumeFileForm;
use App\Filament\Resources\ResumeFiles\Tables\ResumeFilesTable;
use App\Models\ResumeFile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ResumeFileResource extends Resource
{
    protected static ?string $model = ResumeFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'Generate ResumeFile';

    public static function form(Schema $schema): Schema
    {
        return ResumeFileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResumeFilesTable::configure($table);
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
            'index' => ListResumeFiles::route('/'),
            'create' => CreateResumeFile::route('/create'),
            'edit' => EditResumeFile::route('/{record}/edit'),
        ];
    }
}
