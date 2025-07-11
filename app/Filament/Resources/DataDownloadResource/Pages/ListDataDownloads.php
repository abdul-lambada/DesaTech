<?php

namespace App\Filament\Resources\DataDownloadResource\Pages;

use App\Filament\Resources\DataDownloadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataDownloads extends ListRecords
{
    protected static string $resource = DataDownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
