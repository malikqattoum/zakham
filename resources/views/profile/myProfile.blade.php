@extends('layouts.app')

@section('content')

<div class="container text-right">
    <h1>الملف الشخصي</h1>
    <form action="{{route('profileStore')}}" method="POST" id="profileForm">
        @csrf
        <section class="my-2">
            <h5 class="font-weight-bold mt-4">المعلومات الشخصية</h5>
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name')?old('first_name'):$userData->first_name }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="first_name" class="col-md-4 col-form-label text-md-left">الاسم الاول</label>
            </div>

            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name')?old('last_name'):$userData->last_name }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="last_name" class="col-md-4 col-form-label text-md-left">الاسم الأخير</label>
            </div>

            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?old('email'):$userData->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="email" class="col-md-4 col-form-label text-md-left">البريد الالكتروني</label>
            </div>

            {{-- <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="password" class="col-md-4 col-form-label text-md-left">كلمة المرور</label>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" autocomplete="confirm_password">

                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="confirm_password" class="col-md-4 col-form-label text-md-left">تأكيد كلمة المرور</label>
            </div> --}}
            @if (!empty($countries))
                <div class="form-group row">
                    <div class="offset-md-2 col-md-6">
                        <select name="res_country" id="res_country" class="form-control @error('res_country') is-invalid @enderror">
                            <option value="" selected disabled hidden>اختر بلد الإقامة</option>
                            @foreach ($countries as $code=>$country)
                                <option value="{{ $code }}" @if(old('res_country')==$code) selected @elseif($userData->res_country == $code) selected @endif>{{ $country }}</option>
                            @endforeach
                        </select>

                        @error('res_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="res_country" class="col-md-4 col-form-label text-md-left">بلد الإقامة</label>
                </div>
            @endif
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" id="birthdate" type="date" value="{{ old('birthdate')?old('birthdate'):date("Y-m-d",strtotime($userData->birthdate)) }}" placeholder="تاريخ الميلاد" dir="rtl"/>
                    @if($errors->has('birthdate'))
                        <div class="error text-danger">{{ $errors->first('birthdate') }}</div>
                    @endif
                </div>
                <label for="" class="col-md-4 col-form-label text-md-left">تاريخ الميلاد</label>
            </div>
        
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" dir="rtl">
                        <option value="" disabled selected>الجنس</option>
                        <option value="m" @if(old('gender')=="m") selected @elseif($userData->gender == "m") selected @endif>ذكر</option>
                        <option value="f" @if(old('gender')=="f") selected @elseif($userData->gender == "f") selected @endif>أنثى</option>
                    </select>
                    @if($errors->has('gender'))
                        <div class="error text-danger">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
                <label for="" class="col-md-4 col-form-label text-md-left">الجنس</label>
            </div>
        
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <select class="form-control @error('language') is-invalid @enderror" name="language" id="lang" dir="rtl">
                        <option value="" disabled selected>اللغات</option>
                        @foreach ($languages as $code=>$lang)
                        <option value="{{$code}}" @if(old('languages')==$code) selected @elseif($userData->language == $code) selected @endif>{{$lang}}</option>  
                        @endforeach
                    </select>
                    @if($errors->has('language'))
                        <div class="error text-danger">{{ $errors->first('language') }}</div>
                    @endif
                </div>
                <label for="" class="col-md-4 col-form-label text-md-left">اللغات</label>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="phone" value="{{ old('phone')?old('phone'):$userData->phone }}" name="phone" placeholder="962-784-656-899 رقم الهاتف" dir="rtl"/>
                    @if($errors->has('phone'))
                        <div class="error text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <label for="" class="col-md-4 col-form-label text-md-left">رقم الهاتف</label>
            </div>
        </section>
    
    
        <section class="my-2">
            <h5 class="font-weight-bold">التصنيفات</h5>
            @if ($categories->isNotEmpty())
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                        <div class="field_wrapper">
                            <div>
                                <?php $originalDivAdded = false;?>
                                @if (!empty($userCategoriesArr))
                                    @foreach ($userCategoriesArr as $cat_id => $sub_cat_id)
                                        @if (!$originalDivAdded)
                                            <div id="categoriesContainer">
                                        @else
                                            <div>
                                        @endif
                                        <select name="categories[]" onchange="categoriesChange(this)" class="cat-list form-control @error('categories') is-invalid @enderror" dir="rtl">
                                            <option value="" selected disabled hidden>اختر تصنيفا</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"  @if(old('categories')==$category->id) selected @elseif($cat_id == $category->id) selected @endif>{{ $category->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('categories'))
                                            <div class="error text-danger">{{ $errors->first('categories') }}</div>
                                        @endif
                                        <div class="form-group row subcategories-group">
                                            <div class="reg-sub-checkboxes">
                                                @foreach ($subcategories as $category_id =>$subcategory)
                                                    @foreach ($subcategory as $item)
                                                        @if (!empty($item->ar_name))
                                                            <div class="form-check {{$category_id != $cat_id ? 'd-none':'' }} {{ $item->cat_id }}_subcategory float-right" id="{{ $item->cat_id }}_{{ $item->id }}" dir="rtl">
                                                                <input type="checkbox" id="subcat_{{ $item->cat_id }}_{{ $item->id }}" class="form-check-input @error('subcategories') is-invalid @enderror" name="subcategories[]" value="{{ $item->id }}" @if(old('subcategories')==$item->id) checked @elseif(in_array($item->id, $sub_cat_id)) checked @endif>
                                                                <label class="form-check-label mr-4" for="subcat_{{ $item->cat_id }}_{{ $item->id }}">
                                                                    {{ trim($item->ar_name) }}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                        @if ($originalDivAdded)
                                            <a href="javascript:void(0);" class="remove_added_button float-right mb-2 ml-4">ازالة التصنيف</a>
                                        @endif
                                        @if($errors->has('subcategories'))
                                            <div class="error text-danger">{{ $errors->first('subcategories') }}</div>
                                        @endif
                                        @if (!$originalDivAdded)
                                            <?php $originalDivAdded = true;?>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div id="categoriesContainer">
                                        <select name="categories[]" onchange="categoriesChange(this)" class="cat-list form-control @error('categories') is-invalid @enderror" dir="rtl">
                                            <option value="" selected disabled hidden>اختر تصنيفا</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('categories') == $category->id?"selected":"" }}>{{ $category->ar_name }}</option>
                                            @endforeach
                                        </select>
                        
                                        @if($errors->has('categories'))
                                            <div class="error text-danger">{{ $errors->first('categories') }}</div>
                                        @endif
                                        <div class="form-group row d-none subcategories-group">
                                            <div class="reg-sub-checkboxes">
                                                <?php dd($subcategories); ?>
                                                @foreach ($subcategories as $subcategory)
                                                    @foreach ($subcategory as $item)
                                                        @if (!empty($item->ar_name))
                                                            <div class="form-check d-none {{ $item->cat_id }}_subcategory float-right" id="{{ $item->cat_id }}_{{ $item->id }}" dir="rtl">
                                                                <input type="checkbox" id="subcat_{{ $item->cat_id }}_{{ $item->id }}" class="form-check-input @error('subcategories') is-invalid @enderror" name="subcategories[]" value="{{ $item->id }}" {{ old('subcategories') == $item->id?"checked":"" }}>
                                                                <label class="form-check-label mr-4" for="subcat_{{ $item->cat_id }}_{{ $item->id }}">
                                                                    {{ trim($item->ar_name) }}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                        
                                        @if($errors->has('subcategories'))
                                            <div class="error text-danger">{{ $errors->first('subcategories') }}</div>
                                        @endif
                                    </div>
                                @endif
                                <a href="javascript:void(0);" class="btn btn-primary add_button my-2" title="Add field">اضافة تصنيف اخر</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    
        <section class="my-2">
            <h5 class="font-weight-bold">الخبرة العملية</h5>
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <input class="form-control @error('exp_years') is-invalid @enderror" type="number" name="exp_years" value="{{ old('exp_years')?old('exp_years'):$userExperience->exp_years }}" placeholder="عدد سنوات الخبرة" dir="rtl" />
                    @if($errors->has('exp_years'))
                        <div class="error text-danger">{{ $errors->first('exp_years') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-2 col-md-6">
                    <select class="form-control @error('exp_role') is-invalid @enderror" name="exp_role" id="exp_role" dir="rtl">
                        <option value="" disabled selected>المجال</option>
                        @foreach ($expRoles as $id => $role)
                        <option value="{{$id}}" @if(old('exp_role')==$id) selected @elseif($userExperience->exp_role == $id) selected @endif>{{$role}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('exp_role'))
                        <div class="error text-danger">{{ $errors->first('exp_role') }}</div>
                    @endif
                </div>
            </div>
        </section>
        <div class="form-group row">
            <div class="offset-md-2 col-md-6">
                <input type="submit" class="zakham-btn" id="submit" value="تحديث">
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endsection