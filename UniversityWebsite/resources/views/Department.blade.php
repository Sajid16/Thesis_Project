@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{asset('css/Department.css')}}">
<!-- FONT AWESOME -->
<link rel="stylesheet" href="/web-fonts-with-css/CSS/fontawesome-all.min.css">
<link rel="icon" href="{{asset('images/aust-logo.jpg')}}">
<title>Department</title>
@endsection
 

@section('content')
<!-- DEPARTMENTAL MENU STARTS HERE -->
<div class="container-fluid">
  <!-- <a href="{{Route('home')}}"><img class="home-logo" src="{{asset('img/logo.png')}}" float="left"></a> -->
  <div id="heading" align="center">
    <h1 class="heading display-4">Department Of</h1>
    <!-- <h3 class="heading display-8">Computer Science and Engineering</h3> -->
    <?php foreach ($departmentarray['dept'] as $dept): ?>
    <h3 class="heading display-8">{{$dept->deptName}}</h3>
    <!-- <h3 class="heading display-8">Computer Science and Engineering</h3> -->
    <?php endforeach; ?>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse dept_menu" id="navbarSupportedContent">
          <ul class="navbar flex-column mr-auto" class="list-group" style="list-style:none;" align: "left";>
            <li class="dept nav-item active" class="list-group-item">
              <a class="dept nav-link" href="{{url('facultymember')}}/{{$dept->id}}">Faculty members<span class="sr-only">(current)</span></a>
            </li>
            <li class="dept nav-item" class="list-group-item">
              <a class="dept nav-link" href="labfacilities.html">Lab facilities</a>
            </li>
            <li class="dept nav-item dropdown">
              <a class="dept nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            Courses
          </a>
              <div class="dept dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($departmentarray['semester'] as $semester)
              <a class="dept dropdown-item" href="{{url('coursePDF')}}/{{$semester->deptID}}/{{$semester->id}}">{{$semester->semester_name}}</a>
                @endforeach
                {{-- <a class="dept dropdown-item" href="pdf.html">1st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">1st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">4st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">4st year 2st semester</a> --}}
              </div>
            </li>
            <li class="dept nav-item dropdown">
              <a class="dept nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            Class Routine
          </a>
              <div class="dept dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($departmentarray['semester'] as $semester)
                  <a class="dept dropdown-item" href="{{url('routinePDF')}}/{{$semester->deptID}}/{{$semester->id}}">{{$semester->semester_name}}</a>
                  @endforeach
                {{-- <a class="dept dropdown-item" href="pdf.html">1st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">1st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">4st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">4st year 2st semester</a> --}}
              </div>
            </li>
            <li class="dept nav-item dropdown">
              <a class="dept nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            Lab Manual
          </a>
              <div class="dept dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($departmentarray['semester'] as $semester)
                  <a class="dept dropdown-item" href="{{url('labManualPDF')}}/{{$semester->deptID}}/{{$semester->id}}">{{$semester->semester_name}}</a>
                  @endforeach
                {{-- <a class="dept dropdown-item" href="pdf.html">1st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">1st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">2st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 1st semester</a>
                <a class="dept dropdown-item" href="pdf.html">3st year 2st semester</a>
                <a class="dept dropdown-item" href="pdf.html">4st year 1st semester</a>
                <a class="dept dept dropdown-item" href="pdf.html">4st year 2st semester</a> --}}
              </div>
            </li>
            <?php foreach ($departmentarray['dept'] as $dept): ?>
            <li class="dept nav-item" class="list-group-item">
              <a class="dept nav-link" href="{{url('aboutdepartment')}}/{{$dept->id}}">Know Your Department</a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </nav>
    </div>

    <!-- DEPARTMENTAL MENU ENDS HERE -->

    <!-- CAROUSEL STARTS HERE -->

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="../img/main_bg.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../img/bg_img_2.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../img/bg_img_3.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
      </div>
    </div>

    <!-- CAROUSEL ENDS HERE -->

    <!-- NEWS AND ANNOUNCEMENT STARTS HERE -->

    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
      <div class="announcement">
      <a href="{!! url('announcementList') !!}">
          <h1 class="display-4">News & Announcement</h1>
        </a>
      </div>
      <div class="table-wrapper-scroll-y">
        <table class="table table-hover">
          <tbody>
            <?php foreach ($departmentarray['deptnews'] as $deptnews): ?>
            <tr>
              <td style="width:9rem;"><img src="{{asset('images/calendar.png')}}">{{$deptnews->postDate}}</td>
              <td><a href="{{url($deptnews->pageLink)}}/{{$deptnews->id}}" class="news">{{$deptnews->newsTitle}}</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>

  <!-- NEWS AND ANNOUNCEMENT ENDS HERE -->

  <!-- DEPARTMENTAL EVENTS STARTS HERE-->
  <h5 class="display-4 events" color="#1E0026;">EVENTS</h5>
  {{-- <hr class="seperator1" color="#1E0026;"> --}}
  <div class="row">
    @foreach ($departmentarray['data'] as $data)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
      <div class="card">
        <div class="img-event">
          <img class="card-img-top" id="card-img-top" src="..\images\{{$data->eventImg}}" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$data->eventTitle}}</h5>
          <p class="card-text">{{$data->description}}</p>
          <a href="{{url('event')}}/{{$data->id}}" class="btn btn-success">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
    <!--
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/up-event-1.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">AUST NCPC Prize Giving Ceremony</h5>
              <p class="card-text">Here we will appear a little bit description of departmental events only.</p>
              <a href="event.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/up-event-1.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">AUST NCPC Prize Giving Ceremony</h5>
              <p class="card-text">Here we will appear a little bit description of departmental events only.</p>
              <a href="event.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/up-event-1.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">AUST NCPC Prize Giving Ceremony</h5>
              <p class="card-text">Here we will appear a little bit description of departmental events only.</p>
              <a href="event.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      -->
  </div>

  <!-- DEPARTMENTAL EVENTS ENDS HERE -->



  <!--edit  -->
  <h5 class="display-4 message" color="#1E0026;">MESSAGE</h5>
  <hr class="seperator1" color="#1E0026;">
  <div class="container-fluid msg-container">
      <div class="row">
        @foreach ($departmentarray['depthead'] as $depthead)
        @endforeach
        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
          <img src="..\img\depthead\{{$depthead->headImg}}" alt="file not found" width="170" height="205">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 dept-head-name-text">
          <h6>{{$depthead->Name}}</h6>
          <h6>Departmental Head</h6>
          <hr color="#1E0026;" style="width:50%;margin-right:50%">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 msg_part2">
          <p class="lead">{{$depthead->headMsg}}</p>
        </div>
      </div>
  </div>
  <!-- -- >
@endsection