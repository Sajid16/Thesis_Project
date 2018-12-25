@extends('index') 
@section('stylesheet')
<title>Announcement</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/announcement1.css')}}">
@endsection
 
@section('content')
<div class="container announcement-container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card announcement-card" style="width:50%">
                <div class="card-header">
                    <div class="row">
                        <img class="logo-img" src="{{asset('images/aust-logo.jpg')}}" alt="Card image cap">
                    </div>
                    <div class="row">
                        <h4 style="margin:auto;">
                            @foreach ($data as $item)
                                {{$item->newsTitle}}
                            @endforeach
                        </h4>
                    </div>
                </div>
                @foreach ($data as $value)
                    <img class="card-img-top" src="..\images\{{$value->newsImg}}" alt="Card image cap">
                @endforeach
                
                <div class="card-body">
                <p class="card-text"><?php echo $value->description ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection