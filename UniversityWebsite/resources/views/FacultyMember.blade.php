@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/FacultyMember.css">
<title>Faculty Members</title>
@endsection
 
@section('content')
<!-- TODO: GRID FACULTY IDENTIFICATION BEGIN -->
<!-- FACULTY TITLE  BEGIN-->

<div class="container">
  <div class="row text-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <?php foreach ($dept as $dept): ?>
      <h6 class="display-4 py-3 custom-undeline">{{$dept->deptName}}</h6>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- FACULTY TITLE END-->


<div class="container">
  @foreach($facultymember as $facultymember)
  <div class="row py-5">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 fimg">
      <img src="..\img\employee\{{$facultymember->employeeImg}}" class="rounded float-right text-sm-center" alt="">
    </div>

    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
      <h3 class="text-left">{{$facultymember->Name}}</h3>
      <p class="text-left" id="designation">{{$facultymember->positionName}}</p>
      <p class="text-left">Email: {{$facultymember->employeeEmail}}</p>

      <p>
        <a class="btn btn-primary" id="custom-button" data-toggle="collapse" href="#edu{{$facultymember->id}}" role="button" aria-expanded="false"
          aria-controls="collapseExample">Education</a>
        <a class="btn btn-primary" id="custom-button" data-toggle="collapse" href="#exp{{$facultymember->id}}" role="button" aria-expanded="false"
          aria-controls="collapseExample">Experience</a>
        <a class="btn btn-primary" id="custom-button" data-toggle="collapse" href="#pub{{$facultymember->id}}" role="button" aria-expanded="false"
          aria-controls="collapseExample">Publications</a>
        <a class="btn btn-primary" id="custom-button" data-toggle="collapse" href="#aoi{{$facultymember->id}}" role="button" aria-expanded="false"
          aria-controls="collapseExample">Area of Interest</a>
      </p>
      <hr class="style9">
      <div class="collapse" id="edu{{$facultymember->id}}">
        <div class="card card-body">
          {{$facultymember->Education}}
        </div>
        <div class="collapse" id="exp{{$facultymember->id}}">
          <div class="card card-body">
            <?php echo $facultymember->Experience ?>

          </div>
          <div class="collapse" id="pub{{$facultymember->id}}">
            <div class="card card-body">
              {{$facultymember->Publications}}
            </div>
            <div class="collapse" id="aoi{{$facultymember->id}}">
              <div class="card card-body">
                {{$facultymember->AreaofInterest}}
              </div>
            </div>
          </div>
        </div>
        <!-- IDENTIFICATION END -->
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection