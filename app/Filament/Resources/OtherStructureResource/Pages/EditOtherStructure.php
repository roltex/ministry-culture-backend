<?php

namespace App\Filament\Resources\OtherStructureResource\Pages;

use App\Filament\Resources\OtherStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOtherStructure extends EditRecord
{
    protected static string $resource = OtherStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
