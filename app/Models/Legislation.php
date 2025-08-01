<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Legislation extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $table = 'legislation';

    protected $fillable = [
        'title',
        'description',
        'content',
        'excerpt',
        'slug',
        'document_type',
        'act_number',
        'adoption_date',
        'effective_date',
        'status',
        'featured_image',
        'document_file',
        'document_file_ka',
        'document_file_en',
        'is_published',
        'published_at',
        'download_count',
    ];

    public $translatable = [
        'title',
        'description',
        'content',
        'excerpt',
        'document_type',
    ];

    protected $casts = [
        'adoption_date' => 'date',
        'effective_date' => 'date',
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'download_count' => 'integer',
        'document_type' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeByDocumentType($query, $documentType)
    {
        return $query->where('document_type', $documentType);
    }

    public function incrementDownloads()
    {
        $this->increment('download_count');
    }

    public function getDocumentTypes()
    {
        return [
            'law' => [
                'ka' => 'კანონი',
                'en' => 'Law'
            ],
            'regulation' => [
                'ka' => 'დებულება',
                'en' => 'Regulation'
            ],
            'decree' => [
                'ka' => 'დეკრეტი',
                'en' => 'Decree'
            ],
            'order' => [
                'ka' => 'ბრძანება',
                'en' => 'Order'
            ],
            'resolution' => [
                'ka' => 'რეზოლუცია',
                'en' => 'Resolution'
            ],
        ];
    }
} 