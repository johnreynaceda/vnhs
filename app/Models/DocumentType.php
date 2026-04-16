<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class DocumentType extends Model
{
    use Auditable;
    protected $guarded = [];

    public function studentRequests()
    {
        return $this->hasMany(StudentRequest::class);
    }
}
