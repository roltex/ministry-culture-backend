<?php

namespace App\Models;

use App\Models\Traits\HasAuditLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DeputyMinister extends Model
{
    use HasFactory, HasTranslations, HasAuditLogs;

    protected $fillable = [
        'first_name',
        'last_name',
        'description',
        'phone',
        'email',
        'photo',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'telegram_url',
        'attachments',
        'is_active',
    ];

    public $translatable = [
        'first_name',
        'last_name',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'attachments' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getFullNameAttribute()
    {
        $firstName = $this->getTranslation('first_name', app()->getLocale()) ?: $this->getTranslation('first_name', 'ka');
        $lastName = $this->getTranslation('last_name', app()->getLocale()) ?: $this->getTranslation('last_name', 'ka');
        
        return trim($firstName . ' ' . $lastName);
    }
} 