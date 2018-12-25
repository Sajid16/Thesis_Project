@extends('index') 
@section('stylesheet')
<title>Convocation</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/convo.css')}}">
@endsection
 
@section('content')
<!-- Title -->
<div class="container title-container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
            <h3>
                @foreach ($arr['query1'] as $key)
                 {{$key->eventTitle}}
                  @endforeach
            </h3>
        </div>
    </div>
</div>
<!--Convocation Date -->
<div class="container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
            <p>
                @foreach ($arr['query1'] as $key)
                 {{$key->date}}
                 @endforeach
            </p>
        </div>
    </div>
</div>


<!-- Convo Image Slide -->
<div class="container carousel-container">
    <div class="row">
        <div class="col-sm-12">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1"></li>
                    <li data-target="#mycarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" id="slide1">
                    <img src="{{asset($key->eventImg)}}">
                        <div class="carousel-caption">
                            <!-- nothing here -->
                        </div>
                    </div>
                    <!-- <div class="carousel-item" id="slide2">
                        <div class="carousel-caption">
                            <h2>Cation of event</h2>
                            <p> Some description of that event</p>
                        </div>
                    </div>
                    <div class="carousel-item" id="slide3">
                        <div class="carousel-caption">
                            <h2>Cation of event</h2>
                            <p> Some description of that event</p>
                        </div>
                    </div> -->

                </div>
                <!-- <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
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
<!-- Convo Description -->
<div class="container card-container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card event-card">
                <div class="card-header">Description</div>
                <div class="card-body">
                    <h5 class="card-title" id="nthConvo">
                            @foreach ($arr['query1'] as $key)
                            {{$key->eventTitle}}
                          @endforeach
                    </h5>
                    <p class="card-text" id="eventDescription">
                            @foreach ($arr['query1'] as $key)
                            {{$key->description}}
                             @endforeach
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
                                <th scope="col">Title </th>
                                <!-- <th scope="col">Time</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <th scope="row">1</th> -->
                                <td>
                                    @foreach ($arr['query2'] as $key)
                                        {{$key->impNotice}}
                                     @endforeach
                                </td>
                                <!-- <td>14.00</td> -->
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
                    <a href="www.btf-reg.org">www.convo-reg.org</a>

                </div>
            </div>
        </div>
        <!-- Downloadable File -->
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="card required-file" id="reqFiles">
                <div class="card-header">Required Files</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">File Name </th>
                                <th scope="col">file</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">notice</th>
                                <td><button type="button" class="btn btn-link">notice.pdf</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection