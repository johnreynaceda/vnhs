<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Section extends Model
{
    use Auditable;
    protected $guarded = [];

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }

    public function adviser()
    {
        return $this->belongsTo(Teacher::class, 'adviser_teacher_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function modules()
    {
        return $this->hasMany(TeacherModule::class);
    }
}
