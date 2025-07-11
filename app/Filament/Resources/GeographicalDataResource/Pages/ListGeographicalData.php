<?php

namespace App\Filament\Resources\GeographicalDataResource\Pages;

use App\Filament\Resources\GeographicalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeographicalData extends ListRecords
{
    protected static string $resource = GeographicalDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
