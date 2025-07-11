<?php

namespace App\Filament\Resources\AnnouncementAttachmentResource\Pages;

use App\Filament\Resources\AnnouncementAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnnouncementAttachments extends ListRecords
{
    protected static string $resource = AnnouncementAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
