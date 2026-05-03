<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($schoolYear) {
            if ($schoolYear->is_active) {
                SchoolYear::query()
                    ->when($schoolYear->exists, fn ($query) => $query->whereKeyNot($schoolYear->getKey()))
                    ->update(['is_active' => false]);
            }
        });

        static::saved(function ($schoolYear) {
            if ($schoolYear->is_active) {
                Schedule::query()->update(['school_year_id' => $schoolYear->id]);
            }
        });
    }

    public static function active(): ?self
    {
        return static::where('is_active', true)->first();
    }
}
