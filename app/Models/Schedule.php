<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Schedule extends Model
{
    use Auditable;
    protected $guarded = [];

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
}
