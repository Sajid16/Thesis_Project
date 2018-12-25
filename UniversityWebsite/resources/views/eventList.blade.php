@extends('index') 
@section('stylesheet')
<title>Event List</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/eventList.css')}}">
@endsection
 
@section('content')
<!-- Event List Title Started From here -->
<div class="container-flex event-container">
    <div class="row welcome text-center">
        <div class="col-sm-12">
        <h2>Event List <img src="{{asset('images/list.png')}}" alt="list"></h2>
        </div>
    </div>
</div>
<!-- Event List Title Closed From here -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table event-table">
                <thead>
                    <tr>
                        <th scope="col" style="color: darkorange">#</th>
                        <th scope="col" style="color: darkorange">Events Title</th>
                        <th scope="col" style="color: darkorange">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td><a href="{{url('event')}}/{{$value->id}}">{{$value->eventTitle}}</a></td>
                        <td>{{$value->date}}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            {!! $data->links(); !!}
        </div>
    </div>
</div>
<!--<div class="container event-paging-container">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="...">
                <ul class="pagination event-pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">{{$data->links()}}</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div> -->
@endsection