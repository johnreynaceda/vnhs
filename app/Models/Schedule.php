<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
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
}
