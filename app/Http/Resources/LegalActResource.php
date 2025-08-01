<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class LegalActResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => [
                'ka' => $this->getTranslation('title', 'ka'),
                'en' => $this->getTranslation('title', 'en'),
            ],
            'description' => [
                'ka' => $this->getTranslation('description', 'ka'),
                'en' => $this->getTranslation('description', 'en'),
            ],
            'slug' => $this->slug,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
            'attachments' => collect($this->attachments)->map(fn($file) => [
                'file_path' => $file,
                'url' => Storage::url($file),
            ]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
