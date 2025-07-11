<?php

namespace App\Filament\Resources\DetailedScoreResource\Pages;

use App\Filament\Resources\DetailedScoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailedScore extends EditRecord
{
    protected static string $resource = DetailedScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
