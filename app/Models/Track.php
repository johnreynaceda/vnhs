<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Auditable;

class Track extends Model
{
    use Auditable;
    protected $guarded = [];

    public function strands()
    {
        return $this->hasMany(Strand::class);
    }
}
