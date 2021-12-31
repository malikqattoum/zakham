<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInitiative extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'desc',
        'name',
        'video',
        'value',
        'benefit',
        'reason',
        'qualy',
        'sustain',
        'advantage',
        'number',
        'exp',
        'skill',
        'period',
        'period_to',
        'period_from',
        'hours_freq',
        'hours',
        'notes',
        'terms',
        'approved',
    ];
}
