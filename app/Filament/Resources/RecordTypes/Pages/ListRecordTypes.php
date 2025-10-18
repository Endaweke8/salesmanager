<?php

namespace App\Filament\Resources\RecordTypes\Pages;

use App\Filament\Resources\RecordTypes\RecordTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecordTypes extends ListRecords
{
    protected static string $resource = RecordTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
