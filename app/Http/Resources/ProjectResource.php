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
        if (!empty($data['featured_image'])) {
            $data['featured_image'] = Storage::disk('public')->url($data['featured_image']);
        }
        
        return $data;
    }
}
