<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherModule extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function strandSubject()
    {
        return $this->belongsTo(StrandSubject::class);
    }
}
