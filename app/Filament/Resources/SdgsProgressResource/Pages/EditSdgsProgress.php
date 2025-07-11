<?php

namespace App\Filament\Resources\SdgsProgressResource\Pages;

use App\Filament\Resources\SdgsProgressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdgsProgress extends EditRecord
{
    protected static string $resource = SdgsProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
