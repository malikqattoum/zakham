@extends('layouts.app')

@section('content')
<section id="content">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <?php $counter = 0;?>
          @foreach ($carousel as $carouselImage)
            <div class="carousel-item <?=($counter == 0)?'active':''?>">
                <img src="{{asset('storage/'.$carouselImage->image) }}" class="d-block w-100" alt="...">
            </div>
            <?php $counter++; ?>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">التالي</span>
        </button>
    </div>
    @if ($volunteerFields->isNotEmpty())        
        <div class="container my-4">
            <div class="row" id="section-init">
                <div class="col-lg-12 text-center my-4">
                    <h2 class="section-title">مجالات التطوع</h2>
                </div>
                @foreach ($volunteerFields as $item)
                    <div class="col-lg-3 col-sm-6 mb-4 d-flex justify-content-center">
                        <div class="card border-0 shadow rounded-xs">
                            <div class="card-body text-center">
                                <img src="{{asset('storage/'.$item->image) }}" class="mx-auto d-block" />
                                <h4 class="mt-4 mb-3">{{$item->title}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container my-4" id="reg-banner">
        <div class="row home-banner">
            <p class="text-center mt-3"><a href="{{ route('register') }}" class="btn btn-light mr-4 px-4 font-weight-bold">انشاء حساب</a><span class="font-weight-bold ml-4">وظف قدراتك ومهاراتك لدعم القضية الفلسطينية</span></p>
        </div>
    </div>
    @if ($experts->isNotEmpty())        
        <div class="container my-4" id="section-team">
            <div class="row justify-content-center mb-4">
                <div class="col-md-7 text-center mt-4">
                    <h3 class="mb-3 font-weight-bold">المؤثرين والخبراء</h3>
                    <h6 class="subtitle font-weight-bold">كل هؤلاء المؤثرين والخبراء يدعمون منصة زخم, <a href="{{ route('register') }}">هل تود</a> الانضمام؟</h6>
                </div>
            </div>
            <div class="row justify-content-evenly">
                @foreach ($experts as $item)                
                    <!-- column  -->
                    <div class="col-lg-2 mb-4">
                        <!-- Row -->
                        <div class="row bordered-box pt-3">
                            <div class="col-md-12">
                                <img src="{{asset('storage/'.$item->image) }}" alt="wrapkit" class="img-fluid rounded-circle" />
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0">{{$item->name}}</h5>
                                    <h6 class="subtitle mb-3">{{$item->specialty}}</h6>
                                    @if (!empty($item->facebook))
                                        <a href="{{$item->facebook}}" target="_blank"><i class="fab fa-facebook mb-3 mr-1"></i></a>
                                    @endif
                                    @if (!empty($item->instagram))
                                        <a href="{{$item->instagram}}" target="_blank"><i class="fab fa-instagram mb-3 mr-1"></i></a>
                                    @endif
                                    @if (!empty($item->twitter))
                                        <a href="{{$item->twitter}}" target="_blank"><i class="fab fa-twitter mb-3 mr-1"></i></a>
                                    @endif
                                    @if (!empty($item->linkedin))
                                        <a href="{{$item->linkedin}}" target="_blank"><i class="fab fa-linkedin mb-3 mr-1"></i></a>
                                    @endif
                                    @if (!empty($item->youtube))
                                        <a href="{{$item->youtube}}" target="_blank"><i class="fab fa-youtube mb-3 mr-1"></i></a>
                                    @endif
                                    @if (!empty($item->website))
                                        <a href="{{$item->website}}" target="_blank"><i class="fa fa-globe mb-3 mr-1"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                @endforeach
                <!-- column  -->
            </div>
        </div>
    @endif
    @if ($achievments->isNotEmpty()) 
        <div class="container my-4" id="section-achiev">
            <div class="row">
                <section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="container">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-7 text-center mt-4">
                                <h3 class="mb-3 font-weight-bold">من انجازاتنا</h3>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            @foreach ($achievments as $item)
                                <!-- counter -->
                                <div class="col-md-2 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                                    <img src="{{asset('storage/'.$item->icon) }}" alt="wrapkit" class="img-fluid rounded-circle" />
                                    <span class="counter-title">{{$item->title}}</span><span id="anim-number-pizza" class="counter-number"></span> <span class="timer counter alt-font appear" data-to="980" data-speed="7000">{{$item->count}}</span>
                                </div> <!-- end counter -->
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
    @if ($initiative->isNotEmpty())
        <div class="container my-4" id="section-top-init">
            <div class="row">
                <section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="container">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-7 text-center mt-4">
                                <h3 class="mb-3 font-weight-bold">أبرز المبادرات</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($initiative as $item)                            
                                <!-- counter -->
                                <div class="col-md-6 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                                    <span class="counter-title">{{$item->title}}</span><span id="anim-number-pizza" class="counter-number"></span> <span class="timer counter alt-font appear" data-to="980" data-speed="7000">{{$item->count}}</span>
                                </div> <!-- end counter -->
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted" id="homeFooter">
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="#">Zakham.com</a>
        </div>
        <!-- Copyright -->
    </footer>
  <!-- Footer -->
@endsection
