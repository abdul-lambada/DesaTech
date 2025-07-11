<?php

namespace App\Filament\Resources\FamilySizeResource\Pages;

use App\Filament\Resources\FamilySizeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilySize extends EditRecord
{
    protected static string $resource = FamilySizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
