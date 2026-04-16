<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Strand extends Model
{
    use Auditable;
    protected $guarded = [];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
