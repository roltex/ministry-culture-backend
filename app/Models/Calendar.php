<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Calendar extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'event_date',
        'featured_image',
        'gallery',
        'attachments',
        'is_published',
        'slug',
    ];

    public $translatable = [
        'title',
        'content',
        'excerpt',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'event_date' => 'datetime',
        'views_count' => 'integer',
        'gallery' => 'array',
        'attachments' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now())
                    ->orderBy('event_date', 'asc');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now())
                    ->where('event_date', '>=', now())
                    ->orderBy('event_date', 'asc');
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }
}
