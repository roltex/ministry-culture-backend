<?php

namespace App\Filament\Resources\SubordinateInstitutionResource\Pages;

use App\Filament\Resources\SubordinateInstitutionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubordinateInstitutions extends ListRecords
{
    protected static string $resource = SubordinateInstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
