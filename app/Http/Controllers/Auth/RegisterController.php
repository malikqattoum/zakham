<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = route('wizard');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'categories' => ['required'],
            'res_country'=> ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'res_country' => $data['res_country']
        ]);

        if(!empty($data['subcategories']) && is_array($data['subcategories']))
        {
            foreach($data['subcategories'] as $subCategory)
            {
                UserCategory::create([
                    'user_id'=>$user->id,
                    'cat_id'=>$data['categories'],
                    'sub_cat_id'=>$subCategory,
                ]);
            }
        }
        else
        {
            UserCategory::create([
                'user_id'=>$user->id,
                'cat_id'=>$data['categories'],
            ]);
        }

        return $user;

    }

    public function showRegistrationForm()
    {
        $categories = Category::where('active', 1)->where('ar_name', '<>', '')->get();
        $subCategories = [];
        if(!empty($categories))
        {
            foreach($categories as $category)
            {
                $subCategories[$category->id] = SubCategory::where('cat_id', $category->id)->get();
            }
        }

        $countries = Country::get()->pluck('name', 'code');
        $data['countries'] = $countries;
        $data['categories'] = $categories;
        $data['subcategories'] = $subCategories;
       //dd($countries);
        return view('auth.register', $data);
    }
}
