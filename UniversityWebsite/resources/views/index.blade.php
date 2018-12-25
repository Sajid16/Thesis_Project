<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="/web-fonts-with-css/CSS/fontawesome-all.min.css">
  <link rel="icon" href="{{asset('images/aust-logo.jpg')}}">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="{{asset('css/footer.css')}}">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  @yield('stylesheet')


</head>

<body>

  <!-- NAVBAR BEGIN -->
  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{Route('home')}}"><img class="home-logo" src="{{asset('images/aust-logo.jpg')}}">Ahsanullah University of Science & Technology</a>
      <!-- TODO: HERE WILL GO A LOGO ALSO -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{Route('alumni')}}"><img src="{{asset('images/alumni.png')}}" style="margin-left:5%;">Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('GeneralPDF')}}/vacancy"><img src="{{asset('images/vacancy.png')}}" style="margin-right:5%;;">Vacancy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('convo')}}"><img src="{{asset('images/graduate-cap.png')}}" style="margin-right:5%;">Convocation</a>
          </li>
          {{--
          <li class="nav-item">
            <a class="nav-link" href="http://www.aust.edu/publication/index.htm">Research</a>
          </li> --}}
      </div>
  </nav>
  <!-- NAVBAR END -->

  <!-- NAV BEGIN -->
  <ul class="nav justify-content-center flex-column flex-md-row">
    <li class="nav-item">
      <a class="nav-link active" href="{{Route('home')}}">Home</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Academic</a>
      <div class="dropdown-menu">
        <div class="dropdown-header dropdown-header-text">Departments</div>
        <?php foreach ($homearray['departments'] as $departments): ?>
        <a class="dropdown-item" href="{{url('department')}}/{{$departments->id}}" style="font-weight:500">{{$departments->deptName}}</a>
        <?php endforeach; ?>
        <div class="dropdown-divider"></div>
        <!-- <div class="dropdown-header">Secondary Section</div> -->
        <!-- <a class="dropdown-item" href="#">Class Routine</a> -->
        <a class="dropdown-item" href="{{Route('library')}}">Library Facilities</a>
        <a class="dropdown-item" href="{{url('GeneralPDF')}}/calendar">Calender</a>
        <a class="dropdown-item" href="{{Route('tuitionfees')}}">Tuition Fee</a>
        <a class="dropdown-item" href="{{url('GeneralPDF')}}/rules">Academic Rules & Info</a>
        <a class="dropdown-item" href="{{url('GeneralPDF')}}/grading">Examination & Grading System</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('Admission')}}">Admission</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
      <div class="dropdown-menu">
        <?php foreach ($homearray['admin_menu'] as $admin_menu): ?>
        <a class="dropdown-item" href="{{url('admin')}}/{{$admin_menu->id}}">{{$admin_menu->adminMenuName}}</a>
        <?php endforeach; ?>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('aust-life')}}">Life@AUST</a>
    </li>
  </ul>
  <!-- NAV END -->
  @yield('content')
  <!-- FOOTER BEGIN -->
  
  <div class="container-fluid custom-footer">
    <div class="row text-center">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h4 class="py-3">Ahsanullah University of Science and Technology</h4>
        <p>141 & 142, Love Road, Tejgaon Industrial Area, Dhaka-1208.</p>
        <p>Tel. (8802) 8870422, Ext. 107, 114, Fax : (8802) 8870417-18</p>
        <p>Email : info@aust.edu, regr@aust.edu</p>
        <hr class="light">
      </div>
    </div>
  </div>
  <!-- Footer -->
  {{-- <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <section id="footer">
          <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
              <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                  <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                  <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                  <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
                  <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
              </hr>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered
                  MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
              </div>
              </hr>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div> --}}

  <!-- FOOTER END -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</body>

</html>