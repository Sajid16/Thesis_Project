@extends('index') 
@section('stylesheet')
<title>Event</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/event.css')}}">
@endsection
 
@section('content')
<div class="container title-container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
            <h3>
                @foreach ($arr['query1'] as $key) {{$key->eventTitle}} @endforeach
            </h3>
        </div>
    </div>
</div>
<!--Event Date -->
<div class="container date-container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
            <p>
                @foreach ($arr['query1'] as $key) {{$key->date}} @endforeach
            </p>
        </div>
    </div>
</div>


<!-- Event Image Slide -->
<div class="container carousel-container">
    <div class="row">
        <div class="col-sm-12">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <!--<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1"></li>
                    <li data-target="#mycarousel" data-slide-to="2"></li> -->
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img id="eventslide1" src=" ..\images\{{$key->eventImg}}">
                    </div>
                </div>
                <!--<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </div>
    </div>
</div>
<!-- Event Description -->
<div class="container card-container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card event-card">
                <div class="card-header">Description</div>
                <div class="card-body">
                    <h5 class="card-title" id="eventName">
                        @foreach ($arr['query1'] as $key) {{$key->eventTitle}} @endforeach
                    </h5>
                    <p class="card-text" id="eventDescription">
                        @foreach ($arr['query1'] as $key)
                        <?php echo $key->description ?> @endforeach
                    </p>
                </div>
            </div>
        </div>
        <!-- Important Notice -->
        <div class=" col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="card table-card">
                <div class="card-header">Important Notice</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Important News</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($arr['query2'] as $key) {{$key->impNotice}} @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Downloadable Links -->
            <div class="card required-file" id="reqFiles">
                <div class="card-header">Required Files</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col">File Name </th> -->
                                <th scope="col">file</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <th scope="row">notice</th> -->
                                <td>
                                    @foreach ($arr['query2'] as $key)
                                    <button type="button" class="btn btn-link">{{$key->file}}</button> @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Registration Links -->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card reg-card">
                <div class="card-header">Registration Links :</div>
                <div class="card-body" id="regLinks">
                    @foreach ($arr['query1'] as $key)
                    <a href="{{$key->regLink}}">{{$key->regLink}}</a> @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection