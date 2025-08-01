<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use App\Utils\GeorgianTransliterator;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompetition extends CreateRecord
{
    protected static string $resource = CompetitionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure slug is generated from Georgian title if not provided
        if (empty($data['slug']) && !empty($data['title']['ka'])) {
            $data['slug'] = GeorgianTransliterator::generateSlug($data['title']['ka']);
        }
        
        return $data;
    }
}
