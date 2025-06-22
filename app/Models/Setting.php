<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'contact_email',
        'contact_phone',
        'contact_address',
        'working_hours',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'telegram_url',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'yandex_metrika_id',
        'meta_title',
        'meta_description',
        'enable_news',
        'enable_projects',
        'enable_competitions',
        'enable_vacancies',
        'enable_legislation',
        'enable_institutions',
        'news_per_page',
        'projects_per_page',
        'enable_comments',
        'enable_search',
        'enable_newsletter',
        'site_logo',
        'site_favicon',
        'default_image',
    ];

    public $translatable = [
        'site_name',
        'site_description',
        'contact_address',
        'working_hours',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'enable_news' => 'boolean',
        'enable_projects' => 'boolean',
        'enable_competitions' => 'boolean',
        'enable_vacancies' => 'boolean',
        'enable_legislation' => 'boolean',
        'enable_institutions' => 'boolean',
        'enable_comments' => 'boolean',
        'enable_search' => 'boolean',
        'enable_newsletter' => 'boolean',
        'news_per_page' => 'integer',
        'projects_per_page' => 'integer',
    ];

    public static function get($key, $default = null)
    {
        $setting = static::first();
        return $setting ? $setting->$key : $default;
    }

    public static function set($key, $value)
    {
        $setting = static::first();
        
        if ($setting) {
            $setting->update([$key => $value]);
        } else {
            static::create([$key => $value]);
        }
    }

    public static function getGroup($group)
    {
        return static::where('group', $group)->get();
    }
} 