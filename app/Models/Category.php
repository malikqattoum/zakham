<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'active',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'id');
    }
}
