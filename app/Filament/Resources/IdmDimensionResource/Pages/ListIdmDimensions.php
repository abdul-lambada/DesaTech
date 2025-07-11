<?php

namespace App\Filament\Resources\IdmDimensionResource\Pages;

use App\Filament\Resources\IdmDimensionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIdmDimensions extends ListRecords
{
    protected static string $resource = IdmDimensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
