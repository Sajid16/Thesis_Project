@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/Library.css">
<title>Library</title>
@endsection
 
@section('content')
<!-- HEADING PART -->
<div class="container">
  <div id="heading" align="center">
    <h1 class="heading display-8">Library Facilities</h1>
  </div>
</div>
<!-- HEADING PART ENDS -->

<!-- CAROUSEL STARTS HERE -->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </li>
          <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="..\img\main_bg.png" alt="...">
          </div>
          <!-- <div class="carousel-item">
                  <img src="..\img\main_bg.png" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Hello</h5>
                    <p>AUST</p>
                  </div>
                </div> -->
          <!-- <div class="carousel-item">
                  <img src="..\img\main_bg.png" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Hello</h5>
                    <p>AUST</p>
                  </div>
                </div> -->
        </div>
      </div>

    </div>
  </div>
</div>

<!-- CAROUSEL ENDS HERE -->

<!-- ABOUT STARTS HERE -->

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div id="heading" align="center">
        <?php foreach ($libraryarray['librarydet'] as $librarydet): ?>
        <h1 class="heading display-4">{{$librarydet->detailsHead}}</h1>
        <hr color="black">
        <p class="lead dept_desc">{{$librarydet->description}}</p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- ABOUT ENDS HERE -->
@endsection