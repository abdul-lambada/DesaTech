<?php

namespace App\Filament\Resources\EmploymentStatResource\Pages;

use App\Filament\Resources\EmploymentStatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmploymentStats extends ListRecords
{
    protected static string $resource = EmploymentStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
