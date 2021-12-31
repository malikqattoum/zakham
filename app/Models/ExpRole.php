<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpRole extends Model
{
    use HasFactory;

    protected $table = 'exp_roles';

    protected $fillable = [
        'name',
        'ar_name',
    ];
}
