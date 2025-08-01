<?php

namespace App\Filament\Resources\LegalActResource\Pages;

use App\Filament\Resources\LegalActResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalAct extends EditRecord
{
    protected static string $resource = LegalActResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
