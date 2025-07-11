<?php

namespace App\Filament\Resources\HousingStatResource\Pages;

use App\Filament\Resources\HousingStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHousingStat extends EditRecord
{
    protected static string $resource = HousingStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
