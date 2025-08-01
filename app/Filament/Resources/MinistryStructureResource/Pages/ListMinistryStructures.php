<?php

namespace App\Filament\Resources\MinistryStructureResource\Pages;

use App\Filament\Resources\MinistryStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinistryStructures extends ListRecords
{
    protected static string $resource = MinistryStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
