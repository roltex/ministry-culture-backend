<?php

namespace App\Filament\Resources\OtherStructureResource\Pages;

use App\Filament\Resources\OtherStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOtherStructures extends ListRecords
{
    protected static string $resource = OtherStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
