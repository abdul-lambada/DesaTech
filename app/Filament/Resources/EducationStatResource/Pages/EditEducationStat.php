<?php

namespace App\Filament\Resources\EducationStatResource\Pages;

use App\Filament\Resources\EducationStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationStat extends EditRecord
{
    protected static string $resource = EducationStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
