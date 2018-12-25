@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/Alumni.css">
<title>Alumni</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
 
@section('content')
<br>
<div class="container">
  <div id="heading" align="center">
    <h1 class="heading display-8">Alumni List</h1>
  </div>
  <p align="center">Type something in the input field to search the table for names , id , passing year or emails:</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>CGPA</th>
        <th>Email</th>
        <th>Passing Year</th>
        <th>Current Working Position</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php foreach ($alumni as $alumni): ?>
      <tr>
        <td>{{$alumni->studentID}}</td>
        <td>{{$alumni->Name}}</td>
        <td>{{$alumni->deptName}}</td>
        <td>{{$alumni->cgpa}}</td>
        <td>{{$alumni->studentEmail}}</td>
        <td>{{$alumni->passingYear}}</td>
        <td>{{$alumni->currentPosition}}</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>
@endsection