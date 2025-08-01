<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DeputyMinisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        
        // Add full name attribute
        $data['full_name'] = $this->full_name;
        
        // Format the photo URL if it exists
        $data['photo'] = $this->photo ? Storage::url($this->photo) : null;
        
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