<?php

namespace App\Filament\Resources\BudgetRealizationResource\Pages;

use App\Filament\Resources\BudgetRealizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBudgetRealizations extends ListRecords
{
    protected static string $resource = BudgetRealizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
