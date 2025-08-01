<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Menu extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'label',
        'url',
        'icon',
        'parent_id',
        'sort_order',
        'is_active',
        'target',
        'type',
        'page_slug',
    ];

    public $translatable = [
        'label',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Parent relationship
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // Children relationship
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('sort_order');
    }

    // All descendants (recursive)
    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    // All ancestors (recursive)
    public function ancestors()
    {
        return $this->parent()->with('ancestors');
    }

    // Root level menus (no parent)
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Active menus only
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get full URL based on type
    public function getFullUrlAttribute()
    {
        if ($this->type === 'page' && $this->page_slug) {
            return '/pages/' . $this->page_slug;
        }
        
        // If it's a link type and the URL is a valid route, return it as is
        if ($this->type === 'link' && $this->url) {
            return $this->url;
        }
        
        // If it's an external link, return the URL as is
        if ($this->type === 'external' && $this->url) {
            return $this->url;
        }
        
        return $this->url;
    }

    // Get available routes for menu management
    public static function getAvailableRoutes(): array
    {
        return [
            // Main pages
            '/' => 'Home',
            '/about' => 'About Ministry',
            '/minister' => 'Minister',
            '/debuleba' => 'Statute',
            '/contact' => 'Contact',
            
            // News
            '/news' => 'News',
            '/siakhleebi' => 'News (Georgian)',
            
            // Projects
            '/projects' => 'Projects',
            '/proeqtebi' => 'Projects (Georgian)',
            
            // Competitions
            '/competitions' => 'Competitions',
            '/konkursebi' => 'Competitions (Georgian)',
            
            // Vacancies
            '/vacancies' => 'Vacancies',
            '/vakansiebi' => 'Vacancies (Georgian)',
            
            // Legislation
            '/legislation' => 'Legislation',
            '/kanonmdebloba' => 'Legislation (Georgian)',
            
            // Legal Acts
            '/legal-acts' => 'Legal Acts',
            '/samartlebrivi-aktebi' => 'Legal Acts (Georgian)',
            
            // Subordinate Institutions
            '/institutions' => 'Subordinate Institutions',
            '/ssipebi' => 'Subordinate Institutions (Georgian)',
            
            // Procurements
            '/procurements' => 'Procurements',
            '/sheskidvebi' => 'Procurements (Georgian)',
            
            // Reports
            '/reports' => 'Reports',
            '/angarishebi' => 'Reports (Georgian)',
            
            // Privacy & Terms
            '/privacy' => 'Privacy Policy',
            '/terms' => 'Terms of Service',
        ];
    }
}
