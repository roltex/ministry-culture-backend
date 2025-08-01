<?php

namespace App\Filament\Resources\VacancyResource\Pages;

use App\Filament\Resources\VacancyResource;
use App\Utils\GeorgianTransliterator;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVacancy extends CreateRecord
{
    protected static string $resource = VacancyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure slug is generated from Georgian title if not provided
        if (empty($data['slug']) && !empty($data['title']['ka'])) {
            $data['slug'] = GeorgianTransliterator::generateSlug($data['title']['ka']);
        }
        
        return $data;
    }
}
