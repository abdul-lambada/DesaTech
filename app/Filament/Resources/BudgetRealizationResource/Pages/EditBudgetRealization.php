<?php

namespace App\Filament\Resources\BudgetRealizationResource\Pages;

use App\Filament\Resources\BudgetRealizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBudgetRealization extends EditRecord
{
    protected static string $resource = BudgetRealizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
