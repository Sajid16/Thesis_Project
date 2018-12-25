@extends('index') 
@section('stylesheet')
<!-- CUSTOM  TITLE -->
<link rel="stylesheet" href="{!!asset('css/Home.css')!!}">
<title>Ahsanullah University of Science and Technology</title>
@endsection
 
@section('content')
<!-- CAROUSEL BEGIN -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/LoginSidePic.png')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block custom-carousel-caption">
        {{-- <h5 class="display-4">Hacathon Starting Soon!</h5>
        <p class="lead custom-p-description">Join with your team, achieve the biggest hacathon ever in AUST.</p> --}}
        {{-- <button type="button" class="btn btn-outline-light btn-lg">View More</button>
        <button type="button" class="btn btn-primary btn-lg">Join Now</button> --}}
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/LoginSidePic.png')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block custom-carousel-caption">
        {{-- <h5 class="display-4">Get Ready With Your Convocation Hat!</h5>
        <p class="lead custom-p-description">Convocation registration deadline 1 March, 2018</p> --}}
        {{-- <button type="button" class="btn btn-outline-light btn-lg">View More</button>
        <button type="button" class="btn btn-primary btn-lg">Register Now</button> --}}
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/LoginSidePic.png')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block custom-carousel-caption">
        {{-- <h5 class="display-4">AUST Alumni Day Out!</h5>
        <p class="lead custom-p-description">Complete your fee, and get ready for the blast</p> --}}
        {{-- <button type="button" class="btn btn-outline-light btn-lg">View More</button>
        <button type="button" class="btn btn-primary btn-lg">Register Now</button> --}}
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
</div>
<!-- CAROUSEL END -->

<!-- GRID BEGIN -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
      <a href="{{url('eventList')}}">
        <h3 class="py-4" style="color: #285B19">UPCOMING EVENTS</h3>
      </a>
      <div id="carouselEventControl" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner upcomingevents-carousel-inner">
          <div class="carousel-item active eventImage">
            <img id="eventImage" class="d-block w-100" src="images/hult.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              {{-- <h5 class="display-4">AUST PC 2018</h5>
              <h6>MAY 20, 1018</h6>
              <p class="lead">Organized by CSE</p> --}}
            </div>
          </div>
          <div class="carousel-item eventImage">
            <img id="eventImage" class="d-block w-100" src="images/mind-spark.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              {{-- <h5 class="display-4">ICPC Prize Ceremony</h5>
              <h6>AUG 20, 1018</h6>
              <p class="lead">Organized by CSE</p> --}}
            </div>
          </div>
          <div class="carousel-item eventImage">
            <img  id="eventImage"class="d-block w-100" src="images/imagine-cup-19.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              {{-- <h5 class="display-4">IEEE Robotics Award 2018</h5>
              <h6>Dec 12, 1018</h6>
              <p class="lead">Organized by EEE</p> --}}
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselEventControl" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
        <a class="carousel-control-next" href="#carouselEventControl" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
      <a href="{{url('announcementList')}}">
        <h3 class="py-4" style="color: #285B19">ANNOUNCEMENTS</h3>
      </a>
      <div class="table-wrapper-scroll-y">
        <table class="table table-hover">
            <thead class="home-thead">
                <tr>
                  <th scope="col" style="width:9rem;">Date</th>
                  <th scope="col">News</th>
                </tr>
              </thead>
          <tbody>
            <?php foreach ($homearray['news'] as $news): ?>
            <tr>
            <td ><img src="{{asset('images/calendar.png')}}">{{$news->postDate}}</td>
              <td><a href="{{$news->pageLink}}/{{$news->id}}" class="news">{{$news->newsTitle}}</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- GRID END -->

    <!-- ACHIEVEMENT GRID BEGIN -->

    <div class="container-fluid padding">
      <div class="row welcome text-center">
        <div class="col-sm-12">
          <a href="#">
            <h3 class="py-4" style="color: #422978;">ACHIEVEMENTS</h3>
          </a>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <?php foreach ($homearray['achievement'] as $achievement): ?>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <div class="card">
            <div class="img-achievement">
              <img class="card-img-top" src="..\img\achievement\{{$achievement->titleImg}}" alt="image">
            </div>
            <div class="card-body" style="margin-bottom:2%;">
              <h4 class="card-title">{{$achievement->Title}}</h4>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#des{{$achievement->id}}">Read More</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Modal -->

    <div class="container-fluid acvmodal">
      <div class="row">
        <?php foreach ($homearray['achievement'] as $achievement): ?>
        <div class="col-12 col-sm-12 col-md-12 col-xl-12">
          <div class="modal fade bd-example-modal-lg" id="des{{$achievement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">{{$achievement->Title}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                </div>

                <div class="acvimg">
                  <img src="..\img\achievement\{{$achievement->titleImg}}" class="img-rounded" alt="Image not found">
                </div>

                <div class="modal-body">
                  <?php echo $achievement->Description ?>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- <script>
        $(document).ready(function(){
          $('.card').hover(
            function(){
              $(this).animate({
                marginTop:"-=1%",
              },200);
            },

            function(){
              $(this).animate({
                marginTop:"0%",
              },200);
            }
          );
        });
      </script> -->

    <!-- ACHIEVEMENT GRID END -->

    <!-- QUOTES CAROUSEL SLIDER BEGIN -->
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-sm-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img id="hiddenImage" class="d-block w-100" src="images/bg_img_3.png" alt="First slide">
                <div class="carousel-caption d-none d-sm-block">
                  <img class="py-5 vc-image" src="img/employee/vc4.jpg" alt=""style="border-radius:50%; float:left; margin-bottom:7rem;">
                  <p style="margin-top: 6rem; text-align: centre;font-size:1.5rem;">Every individual who has interest in education whether within the country or beyond is warmly welcome to Ahsanullah University of Science and Technology community, preferably in person, and that will be a privilege of mine.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img id="hiddenImage" class="d-block w-100" src="images/bg_img_3.png" alt="Second slide">
                <div class="carousel-caption d-none d-sm-block">
                  <img class="py-5 vc-image" src="img/employee/vc1.jpg" alt=""style="border-radius:50%; float:left; margin-bottom:7rem;">
                  <p style="margin-top: 6rem; text-align: centre;font-size:1.5rem;">AUST is committed to providing quality education and to nurturing creativity for producing successful graduates who will serve our society and the world.
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <img id="hiddenImage" class="d-block w-100" src="images/bg_img_3.png" alt="Third slide">
                <div class="carousel-caption d-none d-sm-block">
                  <img class="py-5 vc-image" src="img/employee/vc3.jpg" alt=""style="border-radius:50%; float:left; margin-bottom:7rem;">
                  <p style="margin-top: 6rem; text-align: centre;font-size:1.5rem;">We do not need magic to change the world, we carry all the power we need inside ourselves already: we have the power to imagine better.</p>
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
    <!-- QUOTES CAROUSEL SLIDER END -->
@endsection