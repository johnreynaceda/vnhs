<?php

namespace App\Traits;

use App\Models\AuditTrail;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function ($model) {
            self::logAudit($model, 'Create', 'Created a new ' . class_basename($model));
        });

        static::updated(function ($model) {
            self::logAudit($model, 'Update', 'Updated ' . class_basename($model));
        });

        static::deleted(function ($model) {
            self::logAudit($model, 'Delete', 'Deleted ' . class_basename($model));
        });
    }

    protected static function logAudit($model, $action, $description)
    {
        if (auth()->check()) {
            AuditTrail::create([
                'user_id' => auth()->id(),
                'module' => class_basename($model),
                'action' => $action,
                'description' => $description,
                'ip_address' => request()->ip(),
            ]);
        }
    }
}
