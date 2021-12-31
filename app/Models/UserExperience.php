<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    protected $table = 'user_experience';

    protected $fillable = [
        'user_id',
        'exp_years',
        'exp_role'
    ];
}
