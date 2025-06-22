<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Vacancy extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'excerpt',
        'slug',
        'application_deadline',
        'department',
        'location',
        'salary_range',
        'salary_min',
        'salary_max',
        'application_form_url',
        'employment_type',
        'contact_email',
        'contact_phone',
        'start_date',
        'duration',
        'application_form',
        'is_published',
        'published_at',
        'is_active',
        'experience_level',
    ];

    public $translatable = [
        'title',
        'description',
        'requirements',
        'excerpt',
        'location',
    ];

    protected $casts = [
        'application_deadline' => 'date',
        'start_date' => 'date',
        'published_at' => 'datetime',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'salary_min' => 'integer',
        'salary_max' => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('application_deadline', '>=', now());
    }

    public function scopeExpired($query)
    {
        return $query->where('application_deadline', '<', now());
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