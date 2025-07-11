<?php

namespace App\Filament\Resources\GeographicalDataResource\Pages;

use App\Filament\Resources\GeographicalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeographicalData extends EditRecord
{
    protected static string $resource = GeographicalDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
