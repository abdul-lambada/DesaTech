<?php

namespace App\Filament\Resources\BudgetOverviewResource\Pages;

use App\Filament\Resources\BudgetOverviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBudgetOverview extends EditRecord
{
    protected static string $resource = BudgetOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
