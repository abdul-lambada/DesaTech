<?php

namespace App\Filament\Resources\QuickContactResource\Pages;

use App\Filament\Resources\QuickContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuickContact extends EditRecord
{
    protected static string $resource = QuickContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
