<?php

namespace App\Filament\Resources\AdministrativeAreaResource\Pages;

use App\Filament\Resources\AdministrativeAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeAreas extends ListRecords
{
    protected static string $resource = AdministrativeAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
