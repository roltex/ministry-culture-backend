<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MinistryStructure extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'address',
        'position',
        'email',
        'phone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'telegram_url',
        'image',
        'parent_id',
        'sort_order',
    ];

    public $translatable = [
        'name',
        'description',
        'address',
        'position',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    // Hierarchy
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    // Attachments
    public function attachments()
    {
        return $this->hasMany(MinistryStructureAttachment::class);
    }

    // Scopes for sorting
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id')->orderBy('sort_order');
    }
}
