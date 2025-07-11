<?php

namespace App\Filament\Resources\QuickContactResource\Pages;

use App\Filament\Resources\QuickContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuickContacts extends ListRecords
{
    protected static string $resource = QuickContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
