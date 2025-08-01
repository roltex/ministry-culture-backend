<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'auditable_type',
        'auditable_id',
        'user_id',
        'user_name',
        'user_email',
        'old_values',
        'new_values',
        'changed_fields',
        'ip_address',
        'user_agent',
        'description',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'changed_fields' => 'array',
    ];

    /**
     * Get the user who performed the action
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the auditable model
     */
    public function auditable()
    {
        return $this->morphTo();
    }

    /**
     * Scope to filter by event type
     */
    public function scopeEvent($query, $event)
    {
        return $query->where('event', $event);
    }

    /**
     * Scope to filter by auditable type
     */
    public function scopeAuditableType($query, $type)
    {
        return $query->where('auditable_type', $type);
    }

    /**
     * Scope to filter by user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Get human readable event name
     */
    public function getEventNameAttribute(): string
    {
        return match($this->event) {
            'created' => 'Created',
            'updated' => 'Updated',
            'deleted' => 'Deleted',
            'published' => 'Published',
            'unpublished' => 'Unpublished',
            'restored' => 'Restored',
            default => ucfirst($this->event),
        };
    }

    /**
     * Get the model name for display
     */
    public function getModelNameAttribute(): string
    {
        return match($this->auditable_type) {
            'App\Models\News' => 'News',
            'App\Models\Calendar' => 'Calendar',
            'App\Models\Competition' => 'Competition',
            'App\Models\Project' => 'Project',
            'App\Models\Procurement' => 'Procurement',
            'App\Models\Vacancy' => 'Vacancy',
            'App\Models\LegalAct' => 'Legal Act',
            'App\Models\Legislation' => 'Legislation',
            'App\Models\Report' => 'Report',
            'App\Models\SubordinateInstitution' => 'Subordinate Institution',
            'App\Models\Page' => 'Page',
            default => class_basename($this->auditable_type),
        };
    }

    /**
     * Get formatted description
     */
    public function getFormattedDescriptionAttribute(): string
    {
        if ($this->description) {
            return $this->description;
        }

        $modelName = $this->model_name;
        $eventName = $this->event_name;

        return "{$eventName} {$modelName}";
    }
}
