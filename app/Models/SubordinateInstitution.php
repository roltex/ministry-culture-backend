<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SubordinateInstitution extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $table = 'subordinate_institutions';

    protected $fillable = [
        'name',
        'description',
        'mission',
        'vision',
        'slug',
        'type',
        'status',
        'director_name',
        'establishment_year',
        'logo',
        'website_url',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'is_published',
        'is_featured',
        'published_at',
        'sort_order',
        'is_active',
    ];

    public $translatable = [
        'name',
        'description',
        'mission',
        'vision',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->orderBy('sort_order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                    ->orderBy('sort_order');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
} 