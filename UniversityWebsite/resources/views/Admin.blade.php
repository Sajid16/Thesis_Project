@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/FacultyMember.css">
<title>Administration</title>
@endsection
 
@section('content')
<!-- FACULTY TITLE  BEGIN-->

<div class="container">
  <div class="row text-center">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <?php foreach ($homearray['adminName'] as $adminName): ?>
      <h6 class="display-4 py-3 custom-undeline">List of {{$adminName->adminMenuName}}</h6>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- FACULTY TITLE END-->

<div class="container">
  <?php foreach ($adminMember as $adminMember): ?>
  <div class="row py-5">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <img src="..\img\employee\{{$adminMember->employeeImg}}" class="rounded float-right text-sm-center" alt="" height="150px">
    </div>

    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
      <h3 class="text-left">{{$adminMember->Name}}</h3>
      <p class="text-left" id="education">{{$adminMember->positionName}}</p>
      <p class="text-left">Email: {{$adminMember->employeeEmail}}</p>
      <p class="text-left">Duration: {{$adminMember->Experience}}</p>

      <!-- <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#exp{{$adminMember->id}}"   role="button" aria-expanded="false" aria-controls="collapseExample">
                Experience
              </a>
            </p>
            <hr class="style9">
            <div class="collapse" id="exp{{$adminMember->id}}">
                <div class="card card-body">
                  {{$adminMember->Experience}}
                </div>
            </div> -->
    </div>
  </div>
  @endforeach
</div>
<!-- IDENTIFICATION END -->
@endsection