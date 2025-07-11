<?php

namespace App\Filament\Resources\HousingStatResource\Pages;

use App\Filament\Resources\HousingStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHousingStats extends ListRecords
{
    protected static string $resource = HousingStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
