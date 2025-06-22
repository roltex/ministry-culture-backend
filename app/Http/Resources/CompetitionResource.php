<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CompetitionResource extends JsonResource
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
            'title' => $this->getTranslations('title'),
            'description' => $this->getTranslations('description'),
            'content' => $this->getTranslations('content'),
            'requirements' => $this->getTranslations('requirements'),
            'excerpt' => $this->getTranslations('excerpt'),
            'slug' => $this->slug,
            'category' => $this->category,
            'prize_amount' => $this->prize_amount,
            'max_participants' => $this->max_participants,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'application_deadline' => $this->application_deadline,
            'registration_deadline' => $this->registration_deadline,
            'competition_start' => $this->competition_start,
            'competition_end' => $this->competition_end,
            'results_announcement' => $this->results_announcement,
            'status' => $this->status,
            'featured_image' => $this->featured_image ? \Storage::disk('public')->url($this->featured_image) : null,
            'application_form' => $this->application_form,
            'is_active' => $this->is_active,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
