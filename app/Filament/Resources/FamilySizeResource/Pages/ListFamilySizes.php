<?php

namespace App\Filament\Resources\FamilySizeResource\Pages;

use App\Filament\Resources\FamilySizeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilySizes extends ListRecords
{
    protected static string $resource = FamilySizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
