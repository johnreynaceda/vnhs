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

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
