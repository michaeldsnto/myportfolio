<?php

namespace App\Filament\Resources\ResumeFiles\Pages;

use App\Filament\Resources\ResumeFiles\ResumeFileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListResumeFiles extends ListRecords
{
    protected static string $resource = ResumeFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
