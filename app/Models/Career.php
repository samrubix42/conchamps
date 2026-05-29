<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $guarded = [];

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJobs::class, 'career_id');
    }
}
