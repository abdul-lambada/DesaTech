<?php

namespace App\Filament\Resources\LetterServiceRequirementResource\Pages;

use App\Filament\Resources\LetterServiceRequirementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterServiceRequirements extends ListRecords
{
    protected static string $resource = LetterServiceRequirementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
