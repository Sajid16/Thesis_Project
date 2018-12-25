@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/AboutDepartment.css">
<title>About Department</title>
@endsection
 
@section('content')
<!-- HEADING PART -->
<div class="container">
  <div id="heading" align="center">
    <h1 class="heading display-8">About</h1>
    <?php foreach ($departmentarray['dept'] as $dept): ?>
    <h1 class="about_dept">{{$dept->deptName}}</h1>
    <?php endforeach; ?>
  </div>
</div>
<!-- HEADING PART ENDS -->

<!-- CAROUSEL STARTS HERE -->

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/main_bg.png" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Hello</h5>
              <p>AUST</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/main_bg.png" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>...</h5>
              <p>...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/main_bg.png" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>...</h5>
              <p>...</p>
            </div>
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
  </div>
</div>

<!-- CAROUSEL ENDS HERE -->

<!-- ABOUT STARTS HERE -->

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <!-- <p class="lead dept_desc">The department of Computer Science and Engineering, abbreviated CSE, is offering an undergraduate engineering degree program since the establishment of the university in the year 1995 with a view to offer quality higher education to numerous worthy
          young fellows as well as to meet the huge demand of highly qualified specialists in the field. The program follows an intensive course curriculum containing well-organized courses on basic sciences, computer science, electrical and electronic
          engineering, computer engineering, management and humanities. Computer science and engineering courses constitute the bulk of the program (about 70%) and are most emphasized, of course. Usual intake of students in the department is twice in
          an year. Students graduated from this department are employed in different prestigious institutions and organizations home and abroad. A good number of our graduates have completed postgraduate programs including doctoral programs with brilliant
          performances at highly ranked universities around the world. The department has a good number of young full-time faculty members with best available exposure to ever-growing horizon of computer science and engineering. Besides, a number of part-time
          faculties also teach in each semester from other universities, research organizations and industrial establishments for extending experience-rich education. The department organizes various co-curricular and extra-curricular activities to develop
          important social and professional faculties in the students. Most common co-curricular activity is the programming contest, which has become regular by this time. And the most common extra-curricular activities are reception parties for welcoming
          the newly entered students and for biding farewell to the outgoing students. The department has developed its own laboratories which include six computer labs and one digital electronics lab equipped with modern personal computers and electronic
          devices. There is a server center attached to the department which is equipped with various PC-server systems for providing network facilities to the labs and offices all over the university campus.</p> -->
      <?php foreach ($departmentarray['dept'] as $dept): ?>
      <p class="lead dept_desc">{{$dept->aboutDept}}</p>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ABOUT ENDS HERE -->
@endsection
