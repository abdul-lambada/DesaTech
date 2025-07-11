<?php

namespace App\Filament\Resources\AgeStatResource\Pages;

use App\Filament\Resources\AgeStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgeStats extends ListRecords
{
    protected static string $resource = AgeStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
