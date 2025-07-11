<?php

namespace App\Filament\Resources\TransparencyIndicatorResource\Pages;

use App\Filament\Resources\TransparencyIndicatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransparencyIndicator extends EditRecord
{
    protected static string $resource = TransparencyIndicatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
