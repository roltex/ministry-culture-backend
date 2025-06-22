<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Competition extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'content',
        'requirements',
        'excerpt',
        'slug',
        'category',
        'prize_amount',
        'max_participants',
        'contact_email',
        'contact_phone',
        'application_deadline',
        'competition_start',
        'competition_end',
        'results_announcement',
        'featured_image',
        'application_form',
        'is_active',
        'is_published',
        'published_at',
        'status',
        'registration_deadline',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
        'requirements',
        'excerpt',
    ];

    protected $casts = [
        'application_deadline' => 'datetime',
        'competition_start' => 'datetime',
        'competition_end' => 'datetime',
        'results_announcement' => 'datetime',
        'published_at' => 'datetime',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'prize_amount' => 'decimal:2',
        'status' => 'string',
        'registration_deadline' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('application_deadline', '>=', now());
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getIsOpenAttribute()
    {
        return $this->is_active && $this->application_deadline >= now();
    }

    public function getDaysLeftAttribute()
    {
        return now()->diffInDays($this->application_deadline, false);
    }
} 