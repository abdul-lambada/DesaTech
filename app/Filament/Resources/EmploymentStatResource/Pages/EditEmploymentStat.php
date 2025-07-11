<?php

namespace App\Filament\Resources\EmploymentStatResource\Pages;

use App\Filament\Resources\EmploymentStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmploymentStat extends EditRecord
{
    protected static string $resource = EmploymentStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
