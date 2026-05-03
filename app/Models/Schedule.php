<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Schedule extends Model
{
    use Auditable;
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($schedule) {
            if (!$schedule->school_year_id) {
                $schedule->school_year_id = SchoolYear::active()?->id;
            }
        });
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function strandSubject()
    {
        return $this->belongsTo(StrandSubject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function modules()
    {
        return $this->hasMany(TeacherModule::class);
    }
}
