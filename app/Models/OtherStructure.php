<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OtherStructure extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'image',
        'link',
    ];

    public $translatable = [
        'title',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}
