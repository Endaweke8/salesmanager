<?php

namespace App\Filament\Resources\RecordTypes\Pages;

use App\Filament\Resources\RecordTypes\RecordTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecordType extends EditRecord
{
    protected static string $resource = RecordTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
