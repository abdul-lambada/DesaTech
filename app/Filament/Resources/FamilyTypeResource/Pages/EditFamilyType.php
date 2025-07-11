<?php

namespace App\Filament\Resources\FamilyTypeResource\Pages;

use App\Filament\Resources\FamilyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyType extends EditRecord
{
    protected static string $resource = FamilyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
