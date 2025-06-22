<?php

namespace App\Filament\Resources\SubordinateInstitutionResource\Pages;

use App\Filament\Resources\SubordinateInstitutionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubordinateInstitution extends EditRecord
{
    protected static string $resource = SubordinateInstitutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
