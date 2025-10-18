<?php

namespace App\Filament\Resources\RecordTypes;

use App\Filament\Resources\RecordTypes\Pages\CreateRecordType;
use App\Filament\Resources\RecordTypes\Pages\EditRecordType;
use App\Filament\Resources\RecordTypes\Pages\ListRecordTypes;
use App\Filament\Resources\RecordTypes\Schemas\RecordTypeForm;
use App\Filament\Resources\RecordTypes\Tables\RecordTypesTable;
use App\Models\RecordType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RecordTypeResource extends Resource
{
    protected static ?string $model = RecordType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return RecordTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecordTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecordTypes::route('/'),
            'create' => CreateRecordType::route('/create'),
            'edit' => EditRecordType::route('/{record}/edit'),
        ];
    }
}
