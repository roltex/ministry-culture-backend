<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'photo',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'telegram_url',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public $translatable = [
        'title',
        'content',
    ];
}
