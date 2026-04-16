<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Student extends Model
{
    use Auditable;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function studentRequests()
    {
        return $this->hasMany(StudentRequest::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
