<?php

namespace App\Filament\Resources\VillageStatResource\Pages;

use App\Filament\Resources\VillageStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillageStats extends ListRecords
{
    protected static string $resource = VillageStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
