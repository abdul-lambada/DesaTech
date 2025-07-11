<?php

namespace App\Filament\Resources\AdministrativeRtResource\Pages;

use App\Filament\Resources\AdministrativeRtResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdministrativeRts extends ListRecords
{
    protected static string $resource = AdministrativeRtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
