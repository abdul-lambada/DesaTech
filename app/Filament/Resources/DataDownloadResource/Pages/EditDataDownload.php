<?php

namespace App\Filament\Resources\DataDownloadResource\Pages;

use App\Filament\Resources\DataDownloadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataDownload extends EditRecord
{
    protected static string $resource = DataDownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
