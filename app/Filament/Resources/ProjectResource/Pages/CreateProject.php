<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Utils\GeorgianTransliterator;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ensure slug is generated from Georgian title if not provided
        if (empty($data['slug']) && !empty($data['title']['ka'])) {
            $data['slug'] = GeorgianTransliterator::generateSlug($data['title']['ka']);
        }
        
        return $data;
    }
}
