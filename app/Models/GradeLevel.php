<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    protected $guarded = [];

    public function strands()
    {
        return $this->hasMany(Strand::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
