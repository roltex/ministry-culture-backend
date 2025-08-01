<?php

namespace App\Filament\Resources\DeputyMinisterResource\Pages;

use App\Filament\Resources\DeputyMinisterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDeputyMinister extends CreateRecord
{
    protected static string $resource = DeputyMinisterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'მინისტრის მოადგილე წარმატებით შეიქმნა';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set default values if needed
        $data['is_active'] = $data['is_active'] ?? true;
        
        return $data;
    }
}
