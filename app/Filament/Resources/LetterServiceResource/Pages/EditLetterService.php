<?php

namespace App\Filament\Resources\LetterServiceResource\Pages;

use App\Filament\Resources\LetterServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterService extends EditRecord
{
    protected static string $resource = LetterServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
