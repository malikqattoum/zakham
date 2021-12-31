<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\User;
use App\Models\Country;

class UserComponent implements CRUDComponent
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
        return User::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['first_name', 'last_name', 'email', 'res_country', 'image'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['first_name', 'last_name', 'email', 'res_country'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            'first_name' => 'text',
            'last_name' => 'text',
            'email' => 'email',
            'password' => 'password',
            'res_country' => ['select' => 
                Country::get()
                    ->pluck('name', 'code') // ['jo' => 'Jordan', 'sa' => 'Saudi Arabia', 'ae' => 'Emirates']
            ],
            'image' => 'file'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        // Password validation:
        // English uppercase characters (A – Z)
        // English lowercase characters (a – z)
        // Base 10 digits (0 – 9)
        // Non-alphanumeric (For example: !, $, #, or %)
        // Unicode characters
        return [
            'first_name' => 'required|min:3|max:60',
            'last_name' => 'required|min:3|max:60',
            'email'     => 'required|email|unique',
            'password' => 'required', 'string', 'min:8',
            //required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return ['image' => 'image/users'];
    }
}
