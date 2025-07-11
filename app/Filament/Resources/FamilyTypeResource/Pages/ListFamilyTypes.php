<?php

namespace App\Filament\Resources\FamilyTypeResource\Pages;

use App\Filament\Resources\FamilyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyTypes extends ListRecords
{
    protected static string $resource = FamilyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
