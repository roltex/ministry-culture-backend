<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MinistryStructureResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'description' => $this->getTranslations('description'),
            'address' => $this->getTranslations('address'),
            'position' => $this->getTranslations('position'),
            'email' => $this->email,
            'phone' => $this->phone,
            'facebook_url' => $this->facebook_url,
            'twitter_url' => $this->twitter_url,
            'instagram_url' => $this->instagram_url,
            'linkedin_url' => $this->linkedin_url,
            'youtube_url' => $this->youtube_url,
            'telegram_url' => $this->telegram_url,
            'image' => $this->image ? Storage::url($this->image) : null,
            'parent_id' => $this->parent_id,
            'sort_order' => $this->sort_order,
            'parent' => $this->parent ? [
                'id' => $this->parent->id,
                'name' => $this->parent->getTranslations('name'),
            ] : null,
            'children' => MinistryStructureResource::collection($this->whenLoaded('children')),
            'attachments' => $this->attachments->map(function ($attachment) {
                return [
                    'id' => $attachment->id,
                    'file' => $attachment->file ? Storage::url($attachment->file) : null,
                    'name' => $attachment->name,
                ];
            }),
        ];
    }
}
