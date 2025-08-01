<?php

namespace App\Filament\Resources\SubordinateInstitutionResource\Pages;

use App\Filament\Resources\SubordinateInstitutionResource;
use App\Utils\GeorgianTransliterator;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubordinateInstitution extends CreateRecord
{
    protected static string $resource = SubordinateInstitutionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure slug is generated from Georgian name if not provided
        if (empty($data['slug']) && !empty($data['name']['ka'])) {
            $data['slug'] = GeorgianTransliterator::generateSlug($data['name']['ka']);
        }
        
        return $data;
    }
}
