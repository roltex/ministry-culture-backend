<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => [
                'ka' => $this->getTranslation('title', 'ka'),
                'en' => $this->getTranslation('title', 'en'),
            ],
            'content' => [
                'ka' => $this->getTranslation('content', 'ka'),
                'en' => $this->getTranslation('content', 'en'),
            ],
            'slug' => $this->slug,
            'photo' => $this->photo ? Storage::url($this->photo) : null,
            'social_links' => [
                'facebook' => $this->facebook_url,
                'twitter' => $this->twitter_url,
                'instagram' => $this->instagram_url,
                'youtube' => $this->youtube_url,
                'linkedin' => $this->linkedin_url,
                'telegram' => $this->telegram_url,
            ],
            'attachments' => collect($this->attachments)->map(fn($file) => [
                'file_path' => $file,
                'url' => Storage::url($file),
            ]),
            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}
