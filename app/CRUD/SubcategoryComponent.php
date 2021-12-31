<?php

namespace App\CRUD;

use App\Models\Category;
use EasyPanel\Contracts\CRUDComponent;
use App\Models\subcategory;

class SubcategoryComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Subcategory::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['name', 'ar_name', 'cat_id'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['name', 'ar_name'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            'name'=>'text',
            'ar_name'=>'text',
            'cat_id' => ['select' => 
                Category::get()
                    ->pluck('name', 'id') // ['jo' => 'Jordan', 'sa' => 'Saudi Arabia', 'ae' => 'Emirates']
            ],
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'name' => 'required|min:3|max:60',
            'ar_name' => 'max:60',
            'cat_id'=> 'required',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
