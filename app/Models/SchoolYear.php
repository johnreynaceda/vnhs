<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saving(function ($schoolYear) {
            if ($schoolYear->is_active) {
                SchoolYear::where('id', '!=', $schoolYear->id)->update(['is_active' => false]);
            }
        });
    }
}
