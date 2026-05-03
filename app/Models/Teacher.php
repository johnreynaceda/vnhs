<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Teacher extends Model
{
    use Auditable;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function advisorySections()
    {
        return $this->hasMany(Section::class, 'adviser_teacher_id');
    }

    public function modules()
    {
        return $this->hasMany(TeacherModule::class);
    }
}
