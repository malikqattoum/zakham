<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\Initiative;

class InitiativeComponent implements CRUDComponent
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
        return Initiative::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['title', 'count'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['title', 'count'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            'title'=>'text',
            'count'=>'text',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'title'=>'required|min:3',
            'count'=>'required',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
