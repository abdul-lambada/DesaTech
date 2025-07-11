<?php

namespace App\Filament\Resources\AdministrativeRtResource\Pages;

use App\Filament\Resources\AdministrativeRtResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeRt extends EditRecord
{
    protected static string $resource = AdministrativeRtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
