<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $guarded = [];

    public function studentRequests()
    {
        return $this->hasMany(StudentRequest::class);
    }
}
