@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="row my-2 mx-2 main border rounded text-right">
        <h1 class="mt-2">اضافة مبادرة</h1>
        <form action="{{route('initiativeStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">اسم المبادرة</label>
                <input type="text" name="init_name" class="form-control @error('init_name') is-invalid @enderror " id="exampleFormControlInput1">
                @if($errors->has('init_name'))
                    <div class="error text-danger">{{ $errors->first('init_name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">اكتب وصف عام للمبادرة في أقل من 100 كلمة (الفكرة)؟ / فيديو إرشادي</label>
                <textarea name="init_desc" class="form-control @error('init_desc') is-invalid @enderror " cols="30" rows="5">{{old('init_desc')}}</textarea>
                @if($errors->has('init_desc'))
                    <div class="error text-danger">{{ $errors->first('init_desc') }}</div>
                @endif
                <label for="" class="mt-2">الفيديو الارشادي</label>
                <input type="file" name="init_video" class="form-control @error('init_video') is-invalid @enderror  mt-1">
                @if($errors->has('init_video'))
                    <div class="error text-danger">{{ $errors->first('init_video') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>لماذا تُعتبر المبادرة مهمة جداً؟ ولماذا يفضل إنشاؤها الآن وليس لاحقاً (المبررات)؟</label>
                <textarea name="init_reason" class="form-control @error('init_reason') is-invalid @enderror " cols="30" rows="5">{{old('init_reason')}}</textarea>
                @if($errors->has('init_reason'))
                    <div class="error text-danger">{{ $errors->first('init_reason') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>من هم المستفيدون الرئيسيون من المبادرة (الفئات المستهدفة)؟</label>
                <textarea name="init_benefit" class="form-control @error('init_benefit') is-invalid @enderror " cols="30" rows="5">{{old('init_benefit')}}</textarea>
                @if($errors->has('init_benefit'))
                    <div class="error text-danger">{{ $errors->first('init_benefit') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>ما الذي تقدمه المبادرة للفئات المستهدفة من خدمات ومنتجات ومنافع (القيم المقترحة)؟</label>
                <textarea name="init_value" class="form-control @error('init_value') is-invalid @enderror " cols="30" rows="5">{{old('init_value')}}</textarea>
                @if($errors->has('init_value'))
                    <div class="error text-danger">{{ $errors->first('init_value') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>ما الجديد في هذه المبادرة؟ وما الذي يجعلها مختلفة عن المبادرات الشبيهة (الميزة التنافسية)؟</label>
                <textarea name="init_advantage" class="form-control @error('init_advantage') is-invalid @enderror " cols="30" rows="5">{{old('init_advantage')}}</textarea>
                @if($errors->has('init_advantage'))
                    <div class="error text-danger">{{ $errors->first('init_advantage') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>كيف ستضمن استدامة المبادرة واستمراريتها أو استدامة أثرها على الأقل (الاستدامة)؟</label>
                <textarea name="init_sustain" class="form-control @error('init_sustain') is-invalid @enderror " cols="30" rows="5">{{old('init_sustain')}}</textarea>
                @if($errors->has('init_sustain'))
                    <div class="error text-danger">{{ $errors->first('init_sustain') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label>لماذا تعتقد أنك الشخص المناسب لإنشاء هذه المبادرة (المؤهلات)؟</label>
                <textarea name="init_qualy" class="form-control @error('init_qualy') is-invalid @enderror " cols="30" rows="5">{{old('init_qualy')}}</textarea>
                @if($errors->has('init_qualy'))
                    <div class="error text-danger">{{ $errors->first('init_qualy') }}</div>
                @endif
            </div>

            <div class="form-group">
                <fieldset>
                    <legend>ما هي الموارد البشرية التي تحتاجها لإنجاح المبادرة بالتفصيل (الفريق)؟</legend>
                    <div class="form-group">
                        <label>المهارة المطلوبة</label>
                        <textarea name="init_skill" class="form-control @error('init_skill') is-invalid @enderror " cols="30" rows="5">{{old('init_skill')}}</textarea>
                        @if($errors->has('init_skill'))
                            <div class="error text-danger">{{ $errors->first('init_skill') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>مستوى الخبرة</label>
                        <input value="{{old('init_exp')}}" name="init_exp" placeholder="5 سنوات" type="text" dir="rtl" class="form-control @error('init_exp') is-invalid @enderror " />
                        @if($errors->has('init_exp'))
                            <div class="error text-danger">{{ $errors->first('init_exp') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>عدد المتطوعين</label>
                        <input value="{{old('init_number')}}" name="init_number" type="number" dir="rtl" class="form-control @error('init_number') is-invalid @enderror " />
                        @if($errors->has('init_number'))
                            <div class="error text-danger">{{ $errors->first('init_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">مدة التطوع</label>
                        <div class="form-check">
                            <label class="form-check-label" for="contPeriod">
                              مستمرة
                            </label>
                            <input class="ml-2 init-periods" value="c" type="radio" name="init_period" id="contPeriod" {{old('init_period') == 'c'?'checked':''}}>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="specificPeriod">
                              محددة
                            </label>
                            <input class="ml-2 init-periods" value="s" type="radio" name="init_period" id="specificPeriod" {{old('init_period') == 's'?'checked':''}}>
                         </div>
                         @if($errors->has('init_period'))
                            <div class="error text-danger">{{ $errors->first('init_period') }}</div>
                        @endif
                         <div id="initPeriodDates" class="d-none">
                            <label for="">:من</label>
                            <input value="{{old('init_period_from')}}" type="date" class="form-control @error('init_period_from') is-invalid @enderror " name="init_period_from">
                            <label for="">:الى</label>
                            <input value="{{old('init_period_from')}}" type="date" class="form-control @error('init_period_to') is-invalid @enderror " name="init_period_to">
                         </div>
                    </div>
                    <div class="form-group">
                        <label>عدد ساعات التطوع</label>
                        <input value="{{old('init_hours')}}" name="init_hours" type="number" dir="rtl" class="form-control @error('init_hours') is-invalid @enderror " />
                        @if($errors->has('init_hours'))
                            <div class="error text-danger">{{ $errors->first('init_hours') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">تكرار ساعات التطوع</label>
                        <div class="form-check">
                            <label class="form-check-label" for="contPeriod">
                              يوميا
                            </label>
                            <input class="ml-2" type="radio" value="d" name="init_hours_freq" id="dailyFreq" {{old('init_hours_freq') == 'd'?'checked':''}}>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="specificPeriod">
                              اسبوعيا
                            </label>
                            <input class="ml-2" type="radio" value="w" name="init_hours_freq" id="weeklyFreq" {{old('init_hours_freq') == 'w'?'checked':''}}>
                         </div>
                         <div class="form-check">
                            <label class="form-check-label" for="specificPeriod">
                              شهريا
                            </label>
                            <input class="ml-2" type="radio" value="m" name="init_hours_freq" id="monthlyFreq" {{old('init_hours_freq') == 'm'?'checked':''}}>
                         </div>
                         @if($errors->has('init_hours_freq'))
                            <div class="error text-danger">{{ $errors->first('init_hours_freq') }}</div>
                        @endif
                         <div class="form-group">
                            <label>شروط يجب توافرها في المتطوع</label>
                            <textarea name="init_terms" class="form-control @error('init_terms') is-invalid @enderror " cols="30" rows="5">{{old('init_terms')}}</textarea>
                            @if($errors->has('init_terms'))
                                <div class="error text-danger">{{ $errors->first('init_terms') }}</div>
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label>ملاحظات إضافية</label>
                <textarea name="init_notes" class="form-control @error('init_notes') is-invalid @enderror " cols="30" rows="5">{{old('init_notes')}}</textarea>
                @if($errors->has('init_notes'))
                    <div class="error text-danger">{{ $errors->first('init_notes') }}</div>
                @endif
            </div>
            <input type="submit" name="add_initiative" class="zakham-btn mb-2" value="اضافة مبادرة"/>
        </form>
    </div>
</div>
@endsection