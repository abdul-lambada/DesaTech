<?php

namespace App\Filament\Resources\BudgetOverviewResource\Pages;

use App\Filament\Resources\BudgetOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBudgetOverviews extends ListRecords
{
    protected static string $resource = BudgetOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
