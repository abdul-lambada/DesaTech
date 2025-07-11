<?php

namespace App\Filament\Resources\IdmScoreResource\Pages;

use App\Filament\Resources\IdmScoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIdmScore extends EditRecord
{
    protected static string $resource = IdmScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
