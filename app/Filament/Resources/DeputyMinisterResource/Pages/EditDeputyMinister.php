<?php

namespace App\Filament\Resources\DeputyMinisterResource\Pages;

use App\Filament\Resources\DeputyMinisterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeputyMinister extends EditRecord
{
    protected static string $resource = DeputyMinisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('წაშლა')
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'მინისტრის მოადგილე წარმატებით განახლდა';
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ensure is_active has a value
        $data['is_active'] = $data['is_active'] ?? false;
        
        return $data;
    }
}
