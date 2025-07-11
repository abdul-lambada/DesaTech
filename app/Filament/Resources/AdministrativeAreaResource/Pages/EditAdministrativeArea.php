<?php

namespace App\Filament\Resources\AdministrativeAreaResource\Pages;

use App\Filament\Resources\AdministrativeAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdministrativeArea extends EditRecord
{
    protected static string $resource = AdministrativeAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
