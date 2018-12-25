@extends('index') 
@section('stylesheet')
<title>Announcement List</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/anouncement.css')}}">
@endsection
 
@section('content')
<!-- Announcement Welcome Text Container -->
<div class="container-fluid ann-container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
            <h2>Aust Announcements<img src="{{asset('images/announcement.png')}}" alt="annoncement logo"></h2>
        </div>
    </div>
</div>
<!--Announcement Filter Container  -->
<div class="container ann-filter">
    <div class="row">
        <div class="col-sm-2">
            <p class="badge-text"><span class="badge badge-dark">Filter :</span></p>
        </div>
        <div class="col-sm-1">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Options
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('announcementFilter')}}/dept">Department</a>
                    <a class="dropdown-item" href="{{url('announcementFilter')}}/date">Date</a>
                    <!-- <a class="dropdown-item" href="{{url('announcementFilter')}}/all">All(Department)</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--Announcement List Table -->
<div class="container ann-table-container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table ann-table">
                <thead>
                    <tr>
                        <!--<th scope="col" style="color: darkorange">#</th>-->
                        <th scope="col" style="color: darkorange">News Title</th>
                        <th scope="col" style="color: darkorange; width: 11%">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                    <tr>
                        <!-- <th scope="row">{{$value->id}}</th> -->
                    <td><a href="{{url($value->pageLink)}}/{{$value->id}}">{{$value->newsTitle}}</a></td>
                        <td>{{$value->postDate}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $data->links(); !!}
        </div>
    </div>
</div>
<!--<div class="container paging-container">
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div> -->
@endsection