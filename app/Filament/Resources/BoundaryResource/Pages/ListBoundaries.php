<?php

namespace App\Filament\Resources\BoundaryResource\Pages;

use App\Filament\Resources\BoundaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoundaries extends ListRecords
{
    protected static string $resource = BoundaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
