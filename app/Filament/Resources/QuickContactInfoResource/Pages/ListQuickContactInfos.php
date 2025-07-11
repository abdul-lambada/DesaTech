<?php

namespace App\Filament\Resources\QuickContactInfoResource\Pages;

use App\Filament\Resources\QuickContactInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuickContactInfos extends ListRecords
{
    protected static string $resource = QuickContactInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
