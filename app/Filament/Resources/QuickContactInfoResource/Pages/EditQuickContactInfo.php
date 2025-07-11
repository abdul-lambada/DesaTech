<?php

namespace App\Filament\Resources\QuickContactInfoResource\Pages;

use App\Filament\Resources\QuickContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuickContactInfo extends EditRecord
{
    protected static string $resource = QuickContactInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
