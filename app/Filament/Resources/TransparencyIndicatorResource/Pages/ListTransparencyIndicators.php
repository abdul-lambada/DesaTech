<?php

namespace App\Filament\Resources\TransparencyIndicatorResource\Pages;

use App\Filament\Resources\TransparencyIndicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransparencyIndicators extends ListRecords
{
    protected static string $resource = TransparencyIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
