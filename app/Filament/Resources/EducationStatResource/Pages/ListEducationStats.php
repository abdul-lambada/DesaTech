<?php

namespace App\Filament\Resources\EducationStatResource\Pages;

use App\Filament\Resources\EducationStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationStats extends ListRecords
{
    protected static string $resource = EducationStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
