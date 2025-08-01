<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'file_path',
        'file_name',
        'file_type',
        'sort_order',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
