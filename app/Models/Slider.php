<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge_name',
        'image_path',
        'title',
        'description',
        'button1_text',
        'button1_link',
        'button2_text',
        'button2_link',
    ];
}

