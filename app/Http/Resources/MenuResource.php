<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $translations = $this->getTranslations('label');
        
        // Debug: Log what translations are available
        \Log::info('Menu translations for ID ' . $this->id, [
            'translations' => $translations,
            'raw_label' => $this->label
        ]);
        
        return [
            'id' => $this->id,
            'label' => $translations, // This returns the full JSON with ka and en
            'url' => $this->full_url,
            'icon' => $this->icon,
            'target' => $this->target,
            'type' => $this->type,
            'page_slug' => $this->page_slug,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'parent_id' => $this->parent_id,
            'has_parent' => !is_null($this->parent_id),
            'has_children' => $this->children && $this->children->count() > 0,
            'children_count' => $this->children ? $this->children->count() : 0,
            'children' => MenuResource::collection($this->whenLoaded('children')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 