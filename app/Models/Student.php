<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
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
}
