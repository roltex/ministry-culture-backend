<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryStructureAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ministry_structure_id',
        'file',
        'name',
    ];

    public function ministryStructure()
    {
        return $this->belongsTo(MinistryStructure::class);
    }
} 