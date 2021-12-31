@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/wizard.css') }}" rel="stylesheet">
@endsection
@section('content')
<div id="svg_wrap"></div>

<h1>الملف الشخصي</h1>
<form action="{{route('wizardStore')}}" method="POST" id="wizardForm">
  @csrf
    <section>
      <h5>المعلومات الشخصية</h5>
    
      <label for="" class="float-right">تاريخ الميلاد</label>
      <input class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" id="birthdate" type="date" value="{{ old('birthdate') }}" placeholder="تاريخ الميلاد" dir="rtl"/>
      @if($errors->has('birthdate'))
          <div class="error text-danger">{{ $errors->first('birthdate') }}</div>
      @endif

      <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" dir="rtl">
          <option value="" disabled selected>الجنس</option>
          <option value="m" {{ old('gender') == "m"?"selected":"" }}>ذكر</option>
          <option value="f" {{ old('gender') == "f"?"selected":"" }}>أنثى</option>
      </select>
      @if($errors->has('gender'))
          <div class="error text-danger">{{ $errors->first('gender') }}</div>
      @endif

      <select class="form-control @error('language') is-invalid @enderror" name="language" id="lang" dir="rtl">
        <option value="" disabled selected>اللغات</option>
        @foreach ($languages as $code=>$lang)
          <option value="{{$code}}" {{ old('language') == $code?"selected":"" }}>{{$lang}}</option>  
        @endforeach
      </select>
      @if($errors->has('language'))
          <div class="error text-danger">{{ $errors->first('language') }}</div>
      @endif

      <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="phone" value="{{ old('phone') }}" name="phone" placeholder="962-000-000-000 رقم الهاتف" dir="rtl"/>
      @if($errors->has('phone'))
          <div class="error text-danger">{{ $errors->first('phone') }}</div>
      @endif
    </section>


    <section>
      <h5>التصنيفات</h5>
      @if ($categories->isNotEmpty())
          <div class="field_wrapper">
            <div>
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
              <a href="javascript:void(0);" class="btn btn-primary add_button float-right my-2" title="Add field">اضافة تصنيف اخر</a>
            </div>
          </div>
        @endif
    </section>

    <section>
      <h5>الخبرة العملية</h5>
      <input class="form-control @error('exp_years') is-invalid @enderror" type="number" name="exp_years" value="{{ old('exp_years') }}" placeholder="عدد سنوات الخبرة" dir="rtl" />
      @if($errors->has('exp_years'))
          <div class="error text-danger">{{ $errors->first('exp_years') }}</div>
      @endif
      <select class="form-control @error('exp_role') is-invalid @enderror" name="exp_role" id="exp_role" dir="rtl">
        <option value="" disabled selected>المجال</option>
        @foreach ($expRoles as $id => $role)
          <option value="{{$id}}" {{ old('exp_role') == $id?"selected":"" }}>{{$role}}</option>
        @endforeach
      </select>
      @if($errors->has('exp_role'))
          <div class="error text-danger">{{ $errors->first('exp_role') }}</div>
      @endif
    </section>

    <div class="button" id="prev">&larr; السابق</div>
    <div class="button" id="next">التالي &rarr;</div>
    <input type="submit" class="button" id="submit" value="إرسال">
</form>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/wizard.js') }}"></script>
@endsection