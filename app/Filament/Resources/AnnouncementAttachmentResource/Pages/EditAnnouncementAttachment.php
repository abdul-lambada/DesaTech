<?php

namespace App\Filament\Resources\AnnouncementAttachmentResource\Pages;

use App\Filament\Resources\AnnouncementAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnouncementAttachment extends EditRecord
{
    protected static string $resource = AnnouncementAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
