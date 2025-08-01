<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProcurementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $lang = $request->header('Accept-Language', 'ka');
        $lang = in_array($lang, ['ka', 'en']) ? $lang : 'ka';

        return [
            'id' => $this->id,
            'title' => $this->getTranslations('title'),
            'description' => $this->getTranslations('description'),
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
