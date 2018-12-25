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
 <div style="width: 10%">
     <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
         <li class="nav-item">
             <a href="{{route('dashboard',['tab' => 'faculty'])}}"
                class="nav-link active">Faculty</a>
         </li>
         <li class="nav-item">
             <a href="{{route('dashboard',['tab' => 'designation'])}}"
                class="nav-link active">Designations</a>
         </li>
         <li class="nav-item">
             <a href="{{route('dashboard',['tab' => 'austlife'])}}"
                class="nav-link active">Life at aust</a>
         </li>
     </ul>
 </div>

 <div class="tab-content" style="width: 90%;">

     <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'faculty') active  @endif" role="tabpanel">
         <div class="row col-lg-12 col-md-12">
             <div class="col-lg-4 col-md-4">
                 <h1>Add Faculty</h1>
                 <form enctype="multipart/form-data" method="POST" action = "{{route('add_faculty')}}">
                     <div class="form-group">
                         <label for="namefield">Name</label>
                         <input type="text" name="name" class="form-control" id="namefield" placeholder="Name">
                     </div>
                     <div class="form-group">
                         <label for="emailfield">Email address</label>
                         <input type="email" name="email" class="form-control" id="emailfield" placeholder="Email address">
                     </div>
                     <div class="form-group">
                         <label for="phonefield">Phone</label>
                         <input type="text" name="phone" class="form-control" id="phonefield" placeholder="Phone Number">
                     </div>
                     <div class="form-group">
                         <label for="designationfield">Designmation</label>
                         <select class="form-control" name="designation">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="departmentselect">Departmentt</label>
                         <select name="department" class="form-control" id="departmentselect">
                             <option value="1">ARCH</option>
                             <option value="2">CE</option>
                             <option value="3">CSE</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="imagefield">Upload an image</label>
                         <input type="file" name="faculty_image" class="form-control-file" id="imagefield">
                     </div>
                     <div class="form-group">
                         <label for="edutextrea">Education</label>
                         <textarea name="edutext" class="form-control" id="edutextrea" rows="3"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="experiencetextarea">Experiences</label>
                         <textarea name="exptext" class="form-control" id="experiencetextarea" rows="3"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="publicationtextarea">Publication</label>
                         <textarea name="publicationtext" class="form-control" id="publicationtextarea" rows="3"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="rewardtextarea">Rewards</label>
                         <textarea name="rewardtext" class="form-control" id="rewardtextarea" rows="3"></textarea>
                     </div>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                     <button type="submit" class="btn btn-primary">Save</button>
                 </form>
             </div>
             <div class="col-lg-8 col-md-8" style="text-align: center">
                 <h1>Faculty List</h1>
                 <table class="table">
                     <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Name</th>
                         <th scope="col">Dept</th>
                         <th scope="col">Edit</th>
                         <th scope="col">Delete</th>
                     </tr>
                     </thead>
                     <tbody>
                        <tr>
                          <th scope="row">here1</th>
                          <td>Month</th>
                          <td>Savings</th>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#">
                                    Edit
                                </button>
                            </td>
                            <td><a href="#">Delete</a></td>
                        </tr>


                         <div class="modal fade" id="faculty{{$faculty->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <form enctype="multipart/form-data" method="POST" action = "{{route('update_faculty')}}">
                                     <input type="hidden" name="faculty_id" value="{{$faculty->id}}">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <div class="modal-body">

                                             <div class="form-group">
                                                 <label for="namefield">Name</label>
                                                 <input type="text" name="name" value="{{$faculty->name}}" class="form-control" id="namefield" placeholder="Name">
                                             </div>
                                             <div class="form-group">
                                                 <label for="emailfield">Email address</label>
                                                 <input type="email" value="{{$faculty->email}}" name="email" class="form-control" id="emailfield" placeholder="Email address">
                                             </div>
                                             <div class="form-group">
                                                 <label for="phonefield">Phone</label>
                                                 <input type="text" value="{{$faculty->phone}}" name="phone" class="form-control" id="phonefield" placeholder="Phone Number">
                                             </div>
                                             <div class="form-group">
                                                 <label for="designationfield">Designmation</label>
                                                 <select class="form-control" name = "designation">
                                                     @foreach($designations as $designation)
                                                         <option value="{{$designation->id}}" @if($designation->id == $faculty->designation) selected @endif>{{$designation->designation}}</option>
                                                     
                                                 </select>
                                             </div>
                                             <div class="form-group">
                                                 <label for="departmentselect">Departmentt</label>
                                                 <select name="department" class="form-control" id="departmentselect">
                                                     <option value="1" @if($faculty->dept_id === 1) {{'selected'}} @endif>ARCH</option>
                                                     <option value="2" @if($faculty->dept_id === 2) {{'selected'}} @endif>CE</option>
                                                     <option value="3" @if($faculty->dept_id === 3) {{'selected'}} @endif>CSE</option>
                                                 </select>
                                             </div>
                                             <div class="form-group">
                                                 <img style="width: 50px; height: 50px" src="{{url::asset('images/faculty-images/'.$faculty->image)}}">
                                                 <label for="imagefield">Upload an image</label>
                                                 <input type="file" name="faculty_image" class="form-control-file" id="imagefield">
                                             </div>
                                             <div class="form-group">
                                                 <label for="edutextrea">Education</label>
                                                 <textarea name="edutext" class="form-control" id="edutextrea" rows="3">{{$faculty->education}}</textarea>
                                             </div>
                                             <div class="form-group">
                                                 <label for="experiencetextarea">Experiences</label>
                                                 <textarea name="exptext" class="form-control" id="experiencetextarea" rows="3">{{$faculty->experience}}</textarea>
                                             </div>
                                             <div class="form-group">
                                                 <label for="publicationtextarea">Publication</label>
                                                 <textarea name="publicationtext" class="form-control" id="publicationtextarea" rows="3">{{$faculty->publication}}</textarea>
                                             </div>
                                             <div class="form-group">
                                                 <label for="rewardtextarea">Rewards</label>
                                                 <textarea name="rewardtext" class="form-control" id="rewardtextarea" rows="3">{{$faculty->awards}}</textarea>
                                             </div>
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">



                                     </div>
                                     <div class="modal-footer">
                                         <button type="submit" class="btn btn-primary">Save</button>
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     </div>
                                 </div>
                                 </form>
                             </div>

                         </div>
                     @endforeach

                     </tbody>
                 </table>
             </div>

         </div>

     </div>

     <div class="tab-pane fade show @if(\Illuminate\Support\Facades\Session::get('tab')== 'designation') active  @endif" role="tabpanel">
         <div class="row" class = "col-lg-12 col-md-12">
             <div class="col-lg-6 col-md-6">
                 <table class="table">
                     <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Designation</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($designations as $designation)
                     <tr>
                         <td>{{$designation->id}}</td>
                         <td>{{$designation->designation}}</td>
                     </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             <div class="col-lg-6 col-md-6">
                 <div style="width: 50%; margin: 0 auto;">
                     <form method="POST" action="{{route('add_designation')}}">
                         <div class="form-group">
                             <label>Designations</label>
                             <input name="designation" type="text" class="form-control" placeholder="Password">
                         </div>
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                 </div>

             </div>
         </div>
     </div>

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
                     <button type="submit" class="btn btn-primary">Submit</button>
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
                     @foreach($stories as $story)
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

 </div>
</div>

 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>


</html>
