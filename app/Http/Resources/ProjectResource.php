<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        
        // Format the featured_image URL if it exists
        $data['featured_image'] = $this->featured_image ? Storage::url($this->featured_image) : null;
        
        // Format gallery image URLs if they exist
        $data['gallery'] = $this->gallery 
            ? array_map(fn($image) => Storage::url($image), $this->gallery)
            : [];
        
        // Format the attachment URLs if they exist
        $data['attachments'] = [];
        if ($this->attachments) {
            $data['attachments'] = collect($this->attachments)->map(function ($attachment) {
                return [
                    'url' => Storage::url($attachment),
                    'name' => basename($attachment),
                    'size' => Storage::exists($attachment) ? Storage::size($attachment) : 0
                ];
            })->toArray();
        }
        
        return $data;
    }
}
