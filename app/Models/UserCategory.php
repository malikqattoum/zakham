<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;

    protected $table = 'users_categories';

    protected $fillable = [
        'user_id',
        'cat_id',
        'sub_cat_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'cat_id');
    }
}
