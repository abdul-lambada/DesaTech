<?php

namespace App\Filament\Resources\IdmScoreResource\Pages;

use App\Filament\Resources\IdmScoreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIdmScores extends ListRecords
{
    protected static string $resource = IdmScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
