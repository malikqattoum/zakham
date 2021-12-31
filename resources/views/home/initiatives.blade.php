@extends('layouts.app')

@section('content')

<div class="row px-4">
    <h1 class="text-right">المبادرات</h1>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body text-center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
          <h5 class="card-title">اضافة مبادرة</h5>
          <!-- Button trigger modal -->
            <a href="{{route('createInitiative')}}" class="zakham-btn">
                أضف مبادرة
            </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row px-4 my-4">
    <div class="container">
      @foreach ($allInitiatives as $item)
        <div class="card my-4 text-right">
          <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            <p class="card-text">{{$item->desc}}</p>
            <a href="{{route('showInitiative', ['id'=>$item->id])}}" target="_blank" class="zakham-btn">عرض المبادرة</a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex">
      <div class="mx-auto">
        {{ $allInitiatives->links("pagination::bootstrap-4") }}
      </div>
    </div>
  </div>

@endsection