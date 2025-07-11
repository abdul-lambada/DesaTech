<?php

namespace App\Filament\Resources\BoundaryResource\Pages;

use App\Filament\Resources\BoundaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoundary extends EditRecord
{
    protected static string $resource = BoundaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
