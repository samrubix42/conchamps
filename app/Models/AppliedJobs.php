<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppliedJobs extends Model
{
    protected $guarded = [];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }
}
