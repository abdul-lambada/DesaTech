<?php

namespace App\Filament\Resources\LetterServiceRequirementResource\Pages;

use App\Filament\Resources\LetterServiceRequirementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterServiceRequirement extends EditRecord
{
    protected static string $resource = LetterServiceRequirementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
