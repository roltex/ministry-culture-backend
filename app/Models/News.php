<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'slug',
        'featured_image',
        'is_published',
        'published_at',
        'views_count',
    ];

    public $translatable = [
        'title',
        'content',
        'excerpt',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
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
                    ->orderBy('published_at', 'desc');
    }

    public function incrementViews()
    {
        $this->increment('views_count');
    }
} 