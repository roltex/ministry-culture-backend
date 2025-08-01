<?php

namespace App\Models\Traits;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

trait HasAuditLogs
{
    /**
     * Boot the trait
     */
    protected static function bootHasAuditLogs()
    {
        static::created(function ($model) {
            $model->logAuditEvent('created');
        });

        static::updated(function ($model) {
            $model->logAuditEvent('updated');
        });

        static::deleted(function ($model) {
            $model->logAuditEvent('deleted');
        });

        // Only register restored if the model uses SoftDeletes
        if (in_array(SoftDeletes::class, class_uses_recursive(static::class))) {
            static::restored(function ($model) {
                $model->logAuditEvent('restored');
            });
        }
    }

    /**
     * Get all audit logs for this model
     */
    public function auditLogs(): MorphMany
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }

    /**
     * Log an audit event
     */
    public function logAuditEvent(string $event, array $additionalData = []): void
    {
        $user = Auth::user();
        
        $data = [
            'event' => $event,
            'auditable_type' => get_class($this),
            'auditable_id' => $this->getKey(),
            'user_id' => $user?->id,
            'user_name' => $user?->name,
            'user_email' => $user?->email,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'description' => $this->getAuditDescription($event),
        ];

        // For updates, store old and new values
        if ($event === 'updated') {
            $data['old_values'] = $this->getOriginal();
            $data['new_values'] = $this->getAttributes();
            $data['changed_fields'] = array_keys($this->getDirty());
        }

        // Merge additional data
        $data = array_merge($data, $additionalData);

        AuditLog::create($data);
    }

    /**
     * Get audit description for the event
     */
    protected function getAuditDescription(string $event): string
    {
        $modelName = $this->getModelDisplayName();
        
        return match($event) {
            'created' => "Created new {$modelName}",
            'updated' => "Updated {$modelName}",
            'deleted' => "Deleted {$modelName}",
            'restored' => "Restored {$modelName}",
            'published' => "Published {$modelName}",
            'unpublished' => "Unpublished {$modelName}",
            default => ucfirst($event) . " {$modelName}",
        };
    }

    /**
     * Get display name for the model
     */
    protected function getModelDisplayName(): string
    {
        return match(get_class($this)) {
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
            'App\Models\DeputyMinister' => 'Deputy Minister',
            default => class_basename($this),
        };
    }

    /**
     * Log a custom event
     */
    public function logCustomEvent(string $event, string $description, array $additionalData = []): void
    {
        $this->logAuditEvent($event, array_merge([
            'description' => $description,
        ], $additionalData));
    }

    /**
     * Get recent audit logs
     */
    public function getRecentAuditLogs(int $limit = 10)
    {
        return $this->auditLogs()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
} 