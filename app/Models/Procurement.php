<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Procurement extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $fillable = [
        'title',
        'description',
        'attachments',
        'slug',
        'is_published',
        'published_at',
    ];

    public $translatable = [
        'title',
        'description',
    ];

    protected $casts = [
        'attachments' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
