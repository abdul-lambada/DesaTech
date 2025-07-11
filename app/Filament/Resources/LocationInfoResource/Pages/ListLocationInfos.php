<?php

namespace App\Filament\Resources\LocationInfoResource\Pages;

use App\Filament\Resources\LocationInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocationInfos extends ListRecords
{
    protected static string $resource = LocationInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
