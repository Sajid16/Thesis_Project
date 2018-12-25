@extends('index') 
@section('stylesheet')
<title>Routine</title>
<link rel="stylesheet" href="{{asset('css/Home.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/announcementPDF.css')}}">
@endsection
 
@section('content')
<div class="container announcement-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card announcement-card" style="">
                <div class="card-header">
                    <div class="row">
                        <img class="logo-img" src="{{asset('images/aust-logo.jpg')}}" alt="Card image cap">
                    </div>
                    {{--
                    <div class="row">
                        <h4 style="margin:auto">
                            @foreach ($data as $item) {{$item->newsTitle}} @endforeach
                        </h4>
                    </div> --}}
                </div>
                <div class="card announcement-card">
                    @foreach ($routine as $value)
                    <object width="1000px" height="1000px" type="application/pdf" data="\pdf\{{$value->class_routine}}"></object>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection