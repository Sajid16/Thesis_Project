{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}

<!------ Include the above in your HEAD tag ---------->
<?php
use Illuminate\Support\Facades\URL as url;
?>

<html>
<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/dashboard.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="d-flex flex-row mt-2">
    <h3 style="margin: 0 auto"> Admin Dashboard</h3>
</div>

    <div class="d-flex flex-row mt-2">
        <div style="width: 15%">
            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'achievement'])}}"
                       class="nav-link active">Achievements</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'admin_menus'])}}"
                       class="nav-link active">Admin Menus</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'library_details'])}}"
                       class="nav-link active">Library Details</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'departments'])}}"
                       class="nav-link active">Departments</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'dept_head'])}}"
                       class="nav-link active">Department Heads</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'employee_positions'])}}"
                       class="nav-link active">Employee Positions</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'employees'])}}"
                       class="nav-link active">Employees</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'events'])}}"
                       class="nav-link active">Events</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'semester_doc'])}}"
                       class="nav-link active">Semester Docs</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'upcoming_events'])}}"
                       class="nav-link active">Upcoming Events</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'alumni'])}}"
                       class="nav-link active">Alumni</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'announcements'])}}"
                       class="nav-link active">Announcements</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard',['tab' => 'austlife'])}}"
                       class="nav-link active">Life at aust</a>
                </li>
            </ul>
        </div>

        <div class="tab-content" style="width: 90%;">

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'achievement') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Achievement</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_achievement')}}">
                            <div class="form-group">
                                <label for="namefield">Title</label>
                                <input type="text" name="title" class="form-control" id="titlefield" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Upload an image</label>
                                <input type="file" name="image" class="form-control-file" id="imagefield">
                            </div>
                            <div class="form-group">
                                <label for="edutextrea">Description</label>
                                <textarea name="achievement_description" class="form-control" id="achievement_description" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="achievement_date">Achievement Date: </label>
                                <input type="date" name="achievement_date" class="form-control" id="achievement_date">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Achievements</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($achievements as $achievement)
                                <tr>
                                    <th scope="row">{{$achievement->id}}</th>
                                    <td>{{$achievement->Title}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#achievement{{$achievement->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_achievement',['id' => $achievement->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="achievement{{$achievement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('update_achievement')}}">
                                                    <input type="hidden" name="achievement_id" value="{{$achievement->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="namefield">Title</label>
                                                                <input type="text" name="title" value="{{$achievement->Title}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Upload an image</label>
                                                                <input type="file" name="image" class="form-control-file" id="imagefield">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edutextrea">Description</label>
                                                                <textarea name="achievement_description" class="form-control" id="edutextrea" rows="3">{{$achievement->Description}}</textarea>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>

            {{--Departments--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'departments') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Department</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_department')}}">
                            <div class="form-group">
                                <label for="dept_name">Name</label>
                                <input type="text" name="dept_name" class="form-control" id="dept_name">
                            </div>
                            <div class="form-group">
                                <label for="dept_short_name">Short name</label>
                                <input type="text" name="dept_short_name" class="form-control" id="dept_short_name" placeholder="Short name">
                            </div>
                            <div class="form-group">
                                <label for="about_dept">About Department</label>
                                <textarea name="about_dept" class="form-control" id="about_dept" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Departments</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <th scope="row">{{$department->id}}</th>
                                    <td>{{$department->deptName}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#achievement{{$department->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_department',['id' => $department->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="achievement{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('update_department')}}">
                                                    <input type="hidden" name="department_id" value="{{$department->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="namefield">Title</label>
                                                                <input type="text" name="dept_name" value="{{$department->deptName}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dept_short_name">Short name</label>
                                                                <input type="text" name="dept_short_name" class="form-control" value="{{$department->deptshortName}}" id="dept_short_name" placeholder="Short name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edutextrea">Description</label>
                                                                <textarea name="about_dept" class="form-control" id="edutextrea" rows="3">{{$department->aboutDept}}</textarea>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>

            {{--Semesters--}}
            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'semester_doc') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add a Doc</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_semester_doc')}}">
                            <div class="form-group">
                                <label for="dept_name">Department</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->deptName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="semester_name">Semester Name</label>
                                <input type="text" name="semester_name" class="form-control" id="semester_name">
                            </div>
                            <div class="form-group">
                                <label for="class_routine">Upload class routine</label>
                                <input type="file" name="class_routine" class="form-control-file" id="class_routine">
                            </div>
                            <div class="form-group">
                                <label for="class_routine">Upload lab manual</label>
                                <input type="file" name="lab_manual" class="form-control-file" id="class_routine">
                            </div>
                            <div class="form-group">
                                <label for="class_routine">Upload courses</label>
                                <input type="file" name="courses" class="form-control-file" id="class_routine">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>All Docs</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Semester Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($semesters as $semester)
                                <tr>
                                    <th scope="row">{{$semester->id}}</th>
                                    <td>{{$semester->semester_name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#semester{{$semester->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_semester',['id' => $semester->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="semester{{$semester->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_semester_doc')}}">
                                                    <input type="hidden" name="semester_id" value="{{$semester->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="dept_name">Department</label>
                                                                <select class="form-control" name="department">
                                                                    @foreach($departments as $department)
                                                                        <option @if($department->id == $semester->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="semester_name">Semester Name</label>
                                                                <input type="text" name="semester_name" value="{{$semester->semester_name}}" class="form-control" id="semester_name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="class_routine">Upload class routine</label>
                                                                <input type="file" name="class_routine" class="form-control-file" id="class_routine">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="class_routine">Upload lab manual</label>
                                                                <input type="file" name="lab_manual" class="form-control-file" id="class_routine">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="class_routine">Upload courses</label>
                                                                <input type="file" name="courses" class="form-control-file" id="class_routine">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>


            {{--Admin Menus--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'admin_menus') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Admin Menus</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_adminMenu')}}">
                            <div class="form-group">
                                <label for="admin_menu_name">Menu Name</label>
                                <input type="text" name="admin_menu_name" class="form-control" id="admin_menu_name">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Admin Menus</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Admin Menus</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin_menus as $admin_menu)
                                <tr>
                                    <th scope="row">{{$admin_menu->id}}</th>
                                    <td>{{$admin_menu->adminMenuName}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#admin_menu{{$admin_menu->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_adminMenu',['id' => $admin_menu->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="admin_menu{{$admin_menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('update_admin_menu')}}">
                                                    <input type="hidden" name="adminMenu_id" value="{{$admin_menu->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="namefield">Admin Menu</label>
                                                                <input type="text" name="admin_menu_name" value="{{$admin_menu->adminMenuName}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>

            {{--Events--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'events') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Admin Menus</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_update_event')}}">
                            <div class="form-group">
                                <label for="event_title">Event Title</label>
                                <input type="text" name="event_title_name" class="form-control" id="event_title">
                            </div>
                            <div class="form-group">
                                <label for="event_des">Description</label>
                                <input type="text" name="event_des_name" class="form-control" id="event_des">
                            </div>
                            <div class="form-group">
                                <label for="event_link">Registration Link</label>
                                <input type="text" name="event_link_name" class="form-control" id="event_link">
                            </div>
                            <div class="form-group">
                                <label for="event_page_link">Page Link</label>
                                <input type="text" name="event_page_link_name" class="form-control" id="event_page_link">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Events</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Events</th>
                                <th scope="col">Page Link</th>
                                <th scope="col">Events</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <th scope="row">{{$event->id}}</th>
                                    <td>{{$event->eventTitle}}</td>
                                    <td>{{$event->regLink}}</td>
                                    <td>{{$event->pageLink}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#event{{$event->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_events',['id' => $event->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="event{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_update_event')}}">
                                                    <input type="hidden" name="event_id" value="{{$event->id}}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="namefield">Event Title</label>
                                                                <input type="text" name="event_title_name" value="{{$event->eventTitle}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edutextrea">Description</label>
                                                                <textarea name="event_des_name"  class="form-control" id="achievement_description" rows="3">{{$event->description}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="namefield">Registration Link</label>
                                                                <input type="text" name="event_link_name" value="{{$event->regLink}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="namefield">Page Link</label>
                                                                <input type="text" name="event_page_link_name" value="{{$event->pageLink}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>

                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
           {{-- Upcoming events--}}
            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'upcoming_events') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Upcoming Event</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_upcoming_event')}}">
                            <div class="form-group">
                                <label for="event">Event</label>
                                <select class="form-control" name="event">
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->eventTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Upload an image</label>
                                <input type="file" name="image" class="form-control-file" id="imagefield">
                            </div>
                            <div class="form-group">
                                <label for="organizer">Organizer</label>
                                <input type="text" name="organizer" class="form-control-file" id="organizer">
                            </div>
                            <div class="form-group">
                                <label for="validity">Validity</label>
                                <select class="form-control" name="validity">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Event Date: </label>
                                <input type="date" name="event_date" class="form-control" id="event_date">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Upcoming Events</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($upcoming_events as $upcoming_event)
                                <tr>
                                    <th scope="row">{{$upcoming_event->id}}</th>
                                    <td>{{$upcoming_event->event->eventTitle}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#up_event{{$upcoming_event->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_up_events',['id' => $upcoming_event->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="up_event{{$upcoming_event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_upcoming_event')}}">
                                                    <input type="hidden" name="event_id" value="{{$upcoming_event->id}}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="event">Event</label>
                                                                <select class="form-control" name="event">
                                                                    @foreach($events as $event)
                                                                        <option @if($upcoming_event->eventId == $event->id) selected @endif value="{{$event->id}}">{{$event->eventTitle}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Upload an image</label>
                                                                <input type="file" name="image" class="form-control-file" id="imagefield">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="organizer">Organizer</label>
                                                                <input type="text" value = "{{$upcoming_event->organizer}}" name="organizer" class="form-control-file" id="organizer">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="validity">Validity</label>
                                                                <select class="form-control" name="validity">
                                                                    <option @if($upcoming_event->validity == "yes") selected @endif value="yes">Yes</option>
                                                                    <option @if($upcoming_event->validity == "no") selected @endif value="no">No</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="event_date">Event Date: </label>
                                                                <input type="date" name="event_date" class="form-control" id="event_date">
                                                            </div>



                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


            {{--Employee Position--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'employee_positions') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Employee Position</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_employee_position')}}">
                            <div class="form-group">
                                <label for="employee_position_name">Employee Position Name</label>
                                <input type="text" name="employee_position_name" class="form-control" id="employee_position_name">
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Employee Position</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Employee Position</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employee_positions as $employee_position)
                                <tr>
                                    <th scope="row">{{$employee_position->id}}</th>
                                    <td>{{$employee_position->positionName}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#employee_position{{$employee_position->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_employee_position',['id' => $employee_position->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="employee_position{{$employee_position->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('update_employee_position')}}">
                                                    <input type="hidden" name="employeePosition_id" value="{{$employee_position->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="namefield">Employee Position</label>
                                                                <input type="text" name="employee_position_name" value="{{$employee_position->positionName}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>



            {{--Library Details--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'library_details') active  @endif" role="tabpanel">

                <div class="row col-lg-12 col-md-12">
                    <div class="col-lg-4 col-md-4">
                        <h1>Add Library Details</h1>
                        <form enctype="multipart/form-data" method="POST" action = "{{route('save_library_details')}}">
                            <div class="form-group">
                                <label for="head_detail_name">Details of Head</label>
                                <input type="text" name="head_detail_name" class="form-control" id="head_detail_name">
                            </div>

                            <div class="form-group">
                                <label for="description_name">Description</label>
                                <input type="text" name="description_name" class="form-control" id="description_name">
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-8" style="text-align: center">
                        <h1>Library Details List</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Head Details</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($library_details as $lib_detail)
                                <tr>
                                    <th scope="row">{{$lib_detail->id}}</th>
                                    <td>{{$lib_detail->detailsHead}}</td>
                                    <td>{{$lib_detail->description}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#library_details{{$lib_detail->id}}">
                                            Edit
                                        </button>
                                    </td>
                                    <td><a href="{{route('delete_library_details',['id' => $lib_detail->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="library_details{{$lib_detail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('update_library_details')}}">
                                                    <input type="hidden" name="libraryDetail_id" value="{{$lib_detail->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label fphpor="namefield">Details of Head</label>
                                                                <input type="text" name="head_detail_name" value="{{$lib_detail->detailsHead}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="namefield">Description</label>
                                                                <input type="text" name="description_name" value="{{$lib_detail->description}}" class="form-control" id="namefield" placeholder="Name">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>



            {{--Aust Life--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'austlife') active  @endif" role="tabpanel">

                <div class="row">
                    <div style="width: 40%;padding-left: 20px">
                        <form enctype="multipart/form-data" method="POST" action="{{route('add_story')}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Story title">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Upload an image</label>
                                <input type="file" name="image" class="form-control-file" id="imagefield">
                            </div>
                            <div class="form-group">
                                <label>Story</label>
                                <textarea name="story" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div style="width: 60%; padding-left: 30px" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Titel</th>
                                <th scope="col">Name</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($austlives as $story)
                                <tr>
                                    <td>{{$story->title}}</td>
                                    <td>{{$story->name}}</td>
                                    <td><a href="{{route('delete_story',['id'=>$story->id])}}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            {{--Aust Life End--}}

            {{--Annoucment --}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'announcements') active  @endif" role="tabpanel">

                <div class="row">
                    <div style="width: 40%;padding-left: 20px">
                        <form enctype="multipart/form-data" method="POST" action="{{route('save_annoucement')}}">
                            <div class="form-group">
                                <label for="dept_name">Department</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                        <option @if($department->id == $semester->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Upload a Pdf</label>
                                <input type="file" name="pdf_file" class="form-control-file" id="imagefield">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Post date</label>
                                <input type="date" name="post_date" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="dept_name">Validity</label>
                                <select class="form-control" name="validity">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Page link</label>
                                <input name="page_link" type="text" class="form-control" placeholder="Page link">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">News Image</label>
                                <input type="file" name="news_image" class="form-control-file" id="imagefield">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="ann_description" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div style="width: 60%; padding-left: 30px" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Titel</th>
                                <th scope="col">Name</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($announcements as $announcement)
                                <tr>
                                    <td>{{$announcement->newsTitle}}</td>
                                    <td>{{$announcement->department->deptName}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ann{{$announcement->id}}">
                                            Edit
                                        </button></td>
                                    <td><a href="{{route('delete_annoucement',['id'=>$announcement->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="ann{{$announcement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form enctype="multipart/form-data" method="POST" action = "{{route('save_annoucement')}}">
                                                <input type="hidden" name="announcement_id" value="{{$announcement->id}}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="dept_name">Department</label>
                                                            <select class="form-control" name="department">
                                                                @foreach($departments as $department)
                                                                    <option @if($department->id == $semester->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input name="title" value = "{{$announcement->newsTitle}}" type="text" class="form-control" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="imagefield">Upload a Pdf</label>
                                                            <input type="file" name="pdf_file" class="form-control-file" id="imagefield">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="imagefield">Post date</label>
                                                            <input type="date" name="post_date" class="form-control-file">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dept_name">Validity</label>
                                                            <select class="form-control" name="validity">
                                                                <option @if($announcement->validity == 'yes') selected @endif value="yes">Yes</option>
                                                                <option @if($announcement->validity == 'no') selected @endif value="no">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Page link</label>
                                                            <input name="page_link" type="text" value="{{$announcement->pageLink}}" class="form-control" placeholder="Story title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="imagefield">News Image</label>
                                                            <input type="file" name="news_image" class="form-control-file" id="imagefield">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="ann_description" class="form-control">{{$announcement->description}}</textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {{--Annoucemnt end--}}


            {{--Employess Start --}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'employees') active  @endif" role="tabpanel">

                <div class="row">
                    <div style="width: 40%;padding-left: 20px">
                        <form enctype="multipart/form-data" method="POST" action="{{route('save_employee')}}">
                            <div class="form-group">
                                <label for="dept_name">Position</label>
                                <select class="form-control" name="position">
                                    @foreach($employee_positions as $employee_position)
                                        <option value="{{$employee_position->id}}">{{$employee_position->positionName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dept_name">Department</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->deptName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Education</label>
                                <input name="education" type="text" class="form-control" placeholder="Education">
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <input name="experience" type="text" class="form-control" placeholder="Experience">
                            </div>
                            <div class="form-group">
                                <label>Area of Interest</label>
                                <input name="area_interest" type="text" class="form-control" placeholder="Area of Interest">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Upload an Image</label>
                                <input type="file" name="image" class="form-control-file" id="imagefield">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Email</label>
                                <input type="email" name="email" class="form-control-file">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div style="width: 60%; padding-left: 30px" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->Name}}</td>
                                    <td>{{$employee->employeeEmail}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#employee{{$employee->id}}">
                                            Edit
                                        </button></td>
                                    <td><a href="{{route('delete_employee',['id'=>$employee->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="employee{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_employee')}}">
                                                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="dept_name">Position</label>
                                                                <select class="form-control" name="position">
                                                                    @foreach($employee_positions as $employee_position)
                                                                        <option @if($employee_position->id == $employee->positionID) selected @endif value="{{$employee_position->id}}">{{$employee_position->positionName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="dept_name">Department</label>
                                                                <select class="form-control" name="department">
                                                                    @foreach($departments as $department)
                                                                        <option @if($department->id == $employee->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input name="name" value = "{{$employee->Name}}" type="text" class="form-control" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Education</label>
                                                                <input name="education" value = "{{$employee->Education}}" type="text" class="form-control" placeholder="Education">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Experience</label>
                                                                <input name="experience" value = "{{$employee->Experience}}" type="text" class="form-control" placeholder="Experience">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Area of Interest</label>
                                                                <input name="area_interest" value = "{{$employee->AreaofInterest}}" type="text" class="form-control" placeholder="Area of Interest">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Upload an Image</label>
                                                                <input type="file" name="image" value = "{{$employee->employeeImg}}" class="form-control-file" id="imagefield">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Email</label>
                                                                <input type="email" name="email" value = "{{$employee->employeeEmail}}" class="form-control-file">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {{--Employees end--}}

            {{--DeptHead Start --}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'dept_head') active  @endif" role="tabpanel">

                <div class="row">
                    <div style="width: 40%;padding-left: 20px">
                        <form enctype="multipart/form-data" method="POST" action="{{route('save_deptHead')}}">
                            <div class="form-group">
                                <label for="dept_name">Department</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->deptName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From</label>
                                <input name="head_from" type="text" class="form-control" placeholder="From">
                            </div>
                            <div class="form-group">
                                <label>To</label>
                                <input name="head_to" type="text" class="form-control" placeholder="To">
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Name</label>
                                <input type="text" name="head_name" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Head Message</label>
                                <textarea name="head_message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imagefield">Head Image</label>
                                <input type="file" name="head_image" class="form-control-file" id="imagefield">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div style="width: 60%; padding-left: 30px" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Message</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dept_heads as $dept_head)
                                <tr>
                                    <td>{{$dept_head->Name}}</td>
                                    <td>{{$dept_head->headMsg}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dept_head{{$dept_head->id}}">
                                            Edit
                                        </button></td>
                                    <td><a href="{{route('delete_deptHead',['id'=>$dept_head->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="dept_head{{$dept_head->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_deptHead')}}">
                                                    <input type="hidden" name="dept_head_id" value="{{$dept_head->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="dept_name">Department</label>
                                                                <select class="form-control" name="department">
                                                                    @foreach($departments as $department)
                                                                        <option @if($department->id == $dept_head->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input name="head_from" value = "{{$dept_head->From}}" type="text" class="form-control" placeholder="Story title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <input name="head_to" value = "{{$dept_head->To}}" type="text" class="form-control" placeholder="Story title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Name</label>
                                                                <input type="text" value = "{{$dept_head->Name}}" name="head_name" class="form-control-file">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Head Message</label>
                                                                <textarea name="head_message" class="form-control">{{$dept_head->headMsg}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="imagefield">Head Image</label>
                                                                <input type="file" name="head_image" value = "{{$dept_head->headImg}}" class="form-control-file" id="imagefield">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {{--DeptHead end--}}

            {{--Alumni--}}

            <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'alumni') active  @endif" role="tabpanel">

                <div class="row">
                    <div style="width: 40%;padding-left: 20px">
                        <form enctype="multipart/form-data" method="POST" action="{{route('save_alumni')}}">
                            <div class="form-group">
                                <label for="dept_name">Department</label>
                                <select class="form-control" name="department">
                                    @foreach($departments as $department)
                                        <option @if($department->id == $semester->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Student ID</label>
                                <input name="student_id" type="text" class="form-control" placeholder="Student ID">
                            </div>
                            <div class="form-group">
                                <label>Student Name</label>
                                <input name="student_name" type="text" class="form-control" placeholder="Student Name">
                            </div>
                            <div class="form-group">
                                <label>Student CGPA</label>
                                <input name="student_cgpa" type="text" class="form-control" placeholder="Student CGPA">
                            </div>
                            <div class="form-group">
                                <label>Student Email</label>
                                <input name="student_email" type="text" class="form-control" placeholder="Student Email Address">
                            </div>
                            <div class="form-group">
                                <label>Current Position</label>
                                <input name="student_position" type="text" class="form-control" placeholder="Student Current Position">
                            </div>
                            <div class="form-group">
                                <label>Passing Year</label>
                                <input name="student_passing_year" type="text" class="form-control" placeholder="Student Passing Year">
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div style="width: 60%; padding-left: 30px" >
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Passing Year</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alumnis as $alumni)
                                <tr>
                                    <td>{{$alumni->studentID}}</td>
                                    <td>{{$alumni->Name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#alum{{$alumni->id}}">
                                            Edit
                                        </button></td>
                                    <td><a href="{{route('delete_alumni',['id'=>$alumni->id])}}">Delete</a></td>

                                    <td>
                                        <div class="modal fade" id="alum{{$alumni->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form enctype="multipart/form-data" method="POST" action = "{{route('save_alumni')}}">
                                                    <input type="hidden" name="alumni_id" value="{{$alumni->id}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="dept_name">Department</label>
                                                                <select class="form-control" name="department">
                                                                    @foreach($departments as $department)
                                                                        <option @if($department->id == $semester->deptID) selected @endif value="{{$department->id}}">{{$department->deptName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Student ID</label>
                                                                <input name="student_id" value = "{{$alumni->studentID}}" type="text" class="form-control" placeholder="Student ID">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Student Name</label>
                                                                <input name="student_name" type="text" value="{{$alumni->Name}}" class="form-control" placeholder="Student Name">
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            {{--Alumni End--}}
        </div>

    </div>

    </div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>


</html>