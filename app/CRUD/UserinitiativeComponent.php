<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\userinitiative;
use App\Models\User;

class UserinitiativeComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = false;

    public function getModel()
    {
        return Userinitiative::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['desc', 'name', 'value', 'benefit', 'reason', 'qualy', 'sustain', 'advantage', 'number', 'exp', 'skill', 'period', 'period_to', 'period_from', 'hours_freq', 'hours', 'notes', 'terms', 'approved'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['desc', 'name', 'value', 'benefit', 'reason', 'qualy', 'sustain', 'advantage', 'number', 'exp', 'skill', 'period', 'period_to', 'period_from', 'hours_freq', 'hours', 'notes', 'terms', 'approved'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $usersArr = [];
        foreach($users as $user)
        {
            $usersArr[$user->id] = $user->first_name.' '.$user->last_name;
        }
        return [
            'user_id'=>['select'=>$usersArr],
            'desc'=>'text',
            'name'=>'text',
            'video'=>'file',
            'value'=>'text',
            'benefit'=>'text',
            'reason'=>'text',
            'qualy'=>'text',
            'sustain'=>'text',
            'advantage'=>'text',
            'number'=>'text',
            'exp'=>'text',
            'skill'=>'text',
            'period'=> ['select' => 
                [
                    'c'=>'مستمرة',
                    's'=>'محددة',
                ]
            ],
            // 'period_to'=>'text',
            // 'period_from'=>'text',
            'hours_freq'=> ['select' => 
                [
                    'd'=>'يوميا',
                    'w'=>'اسبوعيا',
                    'm'=>'شهريا',
                ]
            ],
            'hours'=>'number',
            'notes'=>'text',
            'terms'=>'text',
            'approved'=>'checkbox',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'desc'    => 'required|max:100',
            'name'    => 'required',
            'value'    => 'required',
            'benefit'    => 'required',
            'reason'    => 'required',
            'qualy'    => 'required',
            'sustain'    => 'required',
            'advantage'    => 'required',
            'number'    => 'required',
            'exp'    => 'required',
            'skill'    => 'required',
            'period'    => 'required',
            'hours_freq'    => 'required',
            'hours'    => 'required',
            'terms'    => 'required',
            'video'    =>'file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:100040',
            'user_id'  =>'required',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return ['video' => 'videos'];
    }
}
