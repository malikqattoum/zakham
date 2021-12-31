@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="row my-2 mx-2 main border rounded">
        <!--left-column-->
        <div class="col-md-4 col-12 pl-0">
            <!--image--> <img src="http://127.0.0.1:8000/storage/image/carousel/13-3.jpg" width="100%" height="100%"> </div>
        <!--right-column-->
        <div class="col-md-8 col-12 xcol">
            <h2 class="title pt-5 pb-3 text-center"> تسجيل حساب جديد</h2>
            <form method="POST" action="{{ route('register') }}" class="mb-4">
                @csrf

                <div class="form-group row">
                    <div class="offset-md-2 col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

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
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="email" class="col-md-4 col-form-label text-md-left">البريد الالكتروني</label>
                </div>

                <div class="form-group row">
                    <div class="offset-md-2 col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password" class="col-md-4 col-form-label text-md-left">كلمة المرور</label>
                </div>
                @if (!empty($countries))
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-6">
                            <select name="res_country" id="res_country" class="form-control @error('res_country') is-invalid @enderror">
                                <option value="" selected disabled hidden>اختر بلد الإقامة</option>
                                @foreach ($countries as $code=>$country)
                                    <option value="{{ $code }}">{{ $country }}</option>
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
                @if ($categories->isNotEmpty())
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-6">
                            <select name="categories" id="categories" class="form-control @error('categories') is-invalid @enderror">
                                <option value="" selected disabled hidden>اختر تصنيفا</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->ar_name }}</option>
                                @endforeach
                            </select>

                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="categories" class="col-md-4 col-form-label text-md-left">التصنيفات</label>
                    </div>
                    <div class="form-group row d-none" id="subcategoriesGroup">
                        <div class="offset-md-2 col-md-6 reg-sub-checkboxes">
                            @foreach ($subcategories as $subcategory)
                                @foreach ($subcategory as $item)
                                    @if (!empty($item->ar_name))
                                        <div class="form-check d-none {{ $item->cat_id }}_subcategory" id="{{ $item->cat_id }}_{{ $item->id }}">
                                            <input type="checkbox" id="subcat_{{ $item->cat_id }}_{{ $item->id }}" class="form-check-input @error('subcategories') is-invalid @enderror" name="subcategories[]" value="{{ $item->id }}">
                                            <label class="form-check-label" for="subcat_{{ $item->cat_id }}_{{ $item->id }}">
                                                {{ trim($item->ar_name) }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach

                            @error('subcategories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="subcategories" class="col-md-4 col-form-label text-md-left">التصنيفات الفرعية</label>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('تسجيل') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
