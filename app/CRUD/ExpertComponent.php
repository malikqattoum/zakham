<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\Expert;

class ExpertComponent implements CRUDComponent
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
        return Expert::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'name',
            'specialty',
            'facebook',
            'twitter',
            'instagram',
            'youtube',
            'website',
            'linkedin',
            'image'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['name', 'specialty',  'facebook',
        'twitter',
        'instagram',
        'youtube',
        'website',
        'linkedin'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            'name'=>'text',
            'specialty'=>'text',
            'facebook'=>'text',
            'twitter'=>'text',
            'instagram'=>'text',
            'youtube'=>'text',
            'website'=>'text',
            'linkedin'=>'text',
            'image'=>'file',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'name' => 'required|min:3|max:60',
            'specialty' => 'required|min:3|max:100',
            'facebook'=>'max:255',
            'twitter'=>'max:255',
            'instagram'=>'max:255',
            'youtube'=>'max:255',
            'website'=>'max:255',
            'linkedin'=>'max:255',
            'image' => 'required',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return ['image' => 'image/experts'];
    }
}
