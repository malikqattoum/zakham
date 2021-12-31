<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use App\Models\UserCategory;
use App\Models\ExpRole;
use App\Models\UserExperience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function wizard()
    {
        $languages = Language::get()->pluck('name', 'code');
        $categories = Category::where('active', 1)->where('ar_name', '<>', '')->get();
        $expRoles = ExpRole::get()->pluck('ar_name', 'id');
        $subCategories = [];
        if(!empty($categories))
        {
            foreach($categories as $category)
            {
                $subCategories[$category->id] = SubCategory::where('cat_id', $category->id)->get();
            }
        }
        $data['languages'] = $languages;
        $data['categories'] = $categories;
        $data['subcategories'] = $subCategories;
        $data['expRoles'] = $expRoles;
        return view('profile.wizard', $data);
    }

    public function wizardStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'birthdate'    => 'required',
            'language'     => 'required|max:3',
            'phone'        => 'regex:/[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}/|min:10',
            'gender'       => 'required',
            'categories'   => 'required',
            'exp_years'    => 'required',
            'exp_role'     => 'required',
        ],
        [
            'phone.regex' => 'The :attribute format is invalid, The valid format is xxx-xxx-xxx-xxx including the country code'
        ]);

        if(!$validator->fails())
        {
            $user = User::findOrFail(auth()->user()->id);
            $user->birthdate = $request->birthdate;
            $user->language = $request->language;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->save();

            UserExperience::updateOrCreate(
                ['user_id' => $user->id],
                ['exp_years'=>$request->exp_years,'exp_role'=>$request->exp_role]
            );

            if(!empty($request->categories) && is_array($request->categories))
            {
                $subCatData = SubCategory::get();
                $subCategoriesData = [];
                foreach($subCatData as $subCategory)
                {
                    if(!isset($subCategoriesData[$subCategory->cat_id]))
                        $subCategoriesData[$subCategory->cat_id] = [$subCategory->id];
                    else
                        array_push($subCategoriesData[$subCategory->cat_id], $subCategory->id);
                }
                
                foreach($request->categories as $category)
                {
                    if(!empty($request->subcategories) && is_array($request->subcategories))
                    {
                        foreach($request->subcategories as $subCategory)
                        {
                            if(in_array($subCategory, $subCategoriesData[$category]??[]))
                            {
                                UserCategory::firstOrCreate([
                                    'user_id'=>$user->id,
                                    'cat_id'=>$category,
                                    'sub_cat_id'=>$subCategory,
                                ]);
                            }
                            else
                            {
                                UserCategory::firstOrCreate([
                                    'user_id'=>$user->id,
                                    'cat_id'=>$category,
                                ]);
                            }
                        }
                    }
                    else
                    {
                        UserCategory::firstOrCreate([
                            'user_id'=>$user->id,
                            'cat_id'=>$category,
                        ]);
                    }
                }
            }

            return redirect('/');
        }
        else
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function myProfile()
    {
        $languages = Language::get()->pluck('name', 'code');
        $categories = Category::where('active', 1)->where('ar_name', '<>', '')->get();
        $expRoles = ExpRole::get()->pluck('ar_name', 'id');
        $subCategories = [];
        if(!empty($categories))
        {
            foreach($categories as $category)
            {
                $subCatData = SubCategory::where('cat_id', $category->id)->get();
                if($subCatData->isNotEmpty())
                    $subCategories[$category->id] = $subCatData;

            }
        }
        // dd($subCategories);
        $countries = Country::get()->pluck('name', 'code');
        $userData = User::findOrFail(auth()->user()->id);
        $userCategories = UserCategory::where('user_id', auth()->user()->id)
            ->where('user_id', '=', auth()->user()->id)
            ->get();
        $userCategoriesArr = [];
        foreach($userCategories as $category)
        {
            if(!isset($userCategoriesArr[$category->cat_id]))
                $userCategoriesArr[$category->cat_id] = [$category->sub_cat_id];
            else
                array_push($userCategoriesArr[$category->cat_id], $category->sub_cat_id);
        }
        $userExperience = UserExperience::where('user_id', auth()->user()->id)->first();

        $data['countries'] = $countries;
        $data['languages'] = $languages;
        $data['categories'] = $categories;
        $data['subcategories'] = $subCategories;
        $data['expRoles'] = $expRoles;
        $data['userData'] = $userData;
        $data['userCategories'] = $userCategories;
        $data['userCategoriesArr'] = $userCategoriesArr;
        $data['userExperience'] = $userExperience;
        
        return view('profile.myProfile', $data);
    }

    public function profileStore(Request $request)
    {
        // dd([$request->categories, $request->subcategories]);
        $validator = Validator::make($request->all(), [
            'birthdate'    => 'required',
            'language'     => 'required|max:3',
            'phone'        => 'regex:/[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}/|min:10',
            'gender'       => 'required',
            'categories'   => 'required',
            'exp_years'    => 'required',
            'exp_role'     => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
        ],
        [
            'phone.regex' => 'The :attribute format is invalid, The valid format is xxx-xxx-xxx-xxx including the country code'
        ]);

        if(!$validator->fails())
        {
            $user = User::findOrFail(auth()->user()->id);
            if(!empty($request->birthdate))
                $user->birthdate = $request->birthdate;
            $user->language = $request->language;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->res_country = $request->res_country;
            $user->email = $request->email;

            $user->save();

            UserExperience::updateOrCreate(
                ['user_id' => $user->id],
                ['exp_years'=>$request->exp_years,'exp_role'=>$request->exp_role]
            );

            if(!empty($request->categories) && is_array($request->categories))
            {
                UserCategory::where('user_id', auth()->user()->id)->delete();
                $subCatData = SubCategory::get();
                $subCategoriesData = [];
                foreach($subCatData as $subCategory)
                {
                    if(!isset($subCategoriesData[$subCategory->cat_id]))
                        $subCategoriesData[$subCategory->cat_id] = [$subCategory->id];
                    else
                        array_push($subCategoriesData[$subCategory->cat_id], $subCategory->id);
                }
                
                foreach($request->categories as $category)
                {
                    if(!empty($request->subcategories) && is_array($request->subcategories))
                    {
                        foreach($request->subcategories as $subCategory)
                        {
                            if(isset($subCategoriesData[$category]) && in_array($subCategory, $subCategoriesData[$category]))
                            {
                                UserCategory::firstOrCreate([
                                    'user_id'=>$user->id,
                                    'cat_id'=>$category,
                                    'sub_cat_id'=>$subCategory,
                                ]);
                            }
                            else
                            {
                                UserCategory::firstOrCreate([
                                    'user_id'=>$user->id,
                                    'cat_id'=>$category,
                                ]);
                            }
                        }
                    }
                    else
                    {
                        UserCategory::firstOrCreate([
                            'user_id'=>$user->id,
                            'cat_id'=>$category,
                        ]);
                    }
                }
            }

            return redirect('/initiatives');
        }
        else
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
