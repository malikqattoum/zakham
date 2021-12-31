<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitiativeApply extends Model
{
    use HasFactory;

    protected $table = 'initiative_apply';

        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'init_id',
    ];
}
