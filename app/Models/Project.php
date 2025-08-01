<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $fillable = [
        'title',
        'description',
        'content',
        'excerpt',
        'slug',
        'status',
        'start_date',
        'end_date',
        'featured_image',
        'gallery',
        'attachments',
        'is_featured',
        'is_published',
        'published_at',
        'budget',
        'location',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
        'excerpt',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'budget' => 'integer',
        'gallery' => 'array',
        'attachments' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['planned', 'ongoing']);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'planned' => 'blue',
            'ongoing' => 'green',
            'completed' => 'gray',
            default => 'gray',
        };
    }
} 