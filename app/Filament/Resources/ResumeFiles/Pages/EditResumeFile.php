<?php

namespace App\Filament\Resources\ResumeFiles\Pages;

use App\Filament\Resources\ResumeFiles\ResumeFileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditResumeFile extends EditRecord
{
    protected static string $resource = ResumeFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
