<?php

namespace App\Filament\Resources\SdgsProgressResource\Pages;

use App\Filament\Resources\SdgsProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdgsProgress extends ListRecords
{
    protected static string $resource = SdgsProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
