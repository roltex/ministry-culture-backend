<?php

namespace App\Filament\Resources\DeputyMinisterResource\Pages;

use App\Filament\Resources\DeputyMinisterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeputyMinisters extends ListRecords
{
    protected static string $resource = DeputyMinisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('ახალი მინისტრის მოადგილე')
                ->icon('heroicon-o-plus'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }
}
