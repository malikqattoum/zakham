@extends('layouts.app')

@section('content')

<div class="row px-4">
    <div class="container-fluid text-right">
        <div class="card">
            <div class="card-body">     
                <h1 class="mb-4">معلومات المبادرة</h1>
                <h6 class="font-weight-bold">اسم المبادرة</h6>           
                <p class="card-title">{{$initiative->name}}</p>
                <h6 class="font-weight-bold">وصف المبادرة</h6>
                <p class="card-text">{{$initiative->desc}}</p>
                @if ($initiative->video)
                    <p>
                        <h6>الفيديو الارشادي</h6>
                        <video width="400" controls>
                            <source src="{{$initiative->video}}" type="video/mp4">
                            <source src="{{$initiative->video}}" type="video/ogg">
                            Your browser does not support HTML video.
                        </video>
                    </p>
                @endif
                <h6 class="font-weight-bold">المبررات</h6>
                <p>{{$initiative->reason}}</p>
                <h6 class="font-weight-bold">الفئات المستهدفة</h6>
                <p>{{$initiative->benefit}}</p>   
                <h6 class="font-weight-bold">القيم المقترحة</h6>
                <p>{{$initiative->value}}</p> 
                <h6 class="font-weight-bold">الميزة التنافسية</h6>
                <p>{{$initiative->advantage}}</p>  
                <h6 class="font-weight-bold">الاستدامة</h6>
                <p>{{$initiative->sustain}}</p>
                <h6 class="font-weight-bold">المؤهلات</h6>
                <p>{{$initiative->qualy}}</p>
                <h4 class="font-weight-bold mt-3 mb-2">الفريق</h4>
                <h6 class="font-weight-bold">المهارة المطلوبة</h6>
                <p>{{$initiative->skill}}</p>
                <h6 class="font-weight-bold">مستوى الخبرة</h6>
                <p>{{$initiative->exp}}</p>
                <h6 class="font-weight-bold">عدد المتطوعين</h6>
                <p>{{$initiative->number}}</p>
                <h6 class="font-weight-bold">مدة التطوع</h6>
                <p>{{$initiative->period == "c"?'محددة' : 'مستمرة'}}</p>
                @if ($initiative->period_from)
                    <h6 class="font-weight-bold">من تاريخ</h6>
                    <p>{{$initiative->period_from}}</p>
                @endif
                @if ($initiative->period_to)
                    <h6 class="font-weight-bold">الى تاريخ</h6>
                    <p>{{$initiative->period_to}}</p>
                @endif
                <h6 class="font-weight-bold">عدد ساعات التطوع</h6>
                <p>{{$initiative->hours}}</p>
                <h6 class="font-weight-bold">تكرار ساعات التطوع</h6>
                @switch($initiative->hours_freq)
                    @case('d')
                        <p>يوميا</p>
                        @break
                    @case('w')
                        <p>أسبوعيا</p>
                        @break
                    @case('m')
                        <p>شهريا</p>
                        @break
                    @default
                @endswitch
                <h6 class="font-weight-bold">شروط يجب توافرها في المتطوع</h6>
                <p>{{$initiative->terms}}</p>
                <h6 class="font-weight-bold">ملاحظات إضافية</h6>
                <p>{{$initiative->notes}}</p>
                @if (!$initiativeExist)
                    <a href="{{route('initiativeApply', ['id'=>$initiative->id])}}" class="zakham-btn">التقديم للمبادرة</a>
                @endif
            </div>
        </div>
    </div>    
</div>

@endsection