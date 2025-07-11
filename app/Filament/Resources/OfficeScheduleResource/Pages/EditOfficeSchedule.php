<?php

namespace App\Filament\Resources\OfficeScheduleResource\Pages;

use App\Filament\Resources\OfficeScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOfficeSchedule extends EditRecord
{
    protected static string $resource = OfficeScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
