<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    protected $guarded = [];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
