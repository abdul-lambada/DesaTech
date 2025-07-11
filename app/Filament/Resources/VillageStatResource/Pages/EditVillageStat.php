<?php

namespace App\Filament\Resources\VillageStatResource\Pages;

use App\Filament\Resources\VillageStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillageStat extends EditRecord
{
    protected static string $resource = VillageStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
