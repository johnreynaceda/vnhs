<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class StudentRequest extends Model
{
    use Auditable;
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
