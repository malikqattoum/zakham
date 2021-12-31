<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'website',
        'linkedin',
        'image',
    ];
}
