<?php

namespace App\Filament\Resources\TransparencyScoreResource\Pages;

use App\Filament\Resources\TransparencyScoreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransparencyScores extends ListRecords
{
    protected static string $resource = TransparencyScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
