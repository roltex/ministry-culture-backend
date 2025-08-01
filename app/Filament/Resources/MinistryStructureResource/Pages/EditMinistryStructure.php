<?php

namespace App\Filament\Resources\MinistryStructureResource\Pages;

use App\Filament\Resources\MinistryStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinistryStructure extends EditRecord
{
    protected static string $resource = MinistryStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
