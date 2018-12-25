@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/Alumni.css">
<title>Tuition Fees</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
 
@section('content')
<br>
<div class="container">
  <div id="heading" align="center">
    <h1 class="heading display-8">Tuition Fees</h1>
  </div>
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>NAME OF PROGRAMS</th>
        <th>AT THE TIME OF ADMISSION</th>
        <th>SUBSEQUENT EACH  SEMESTER</th>
        <th>TOTAL FEE</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php foreach ($tuition as $tuition): ?>
      <tr>
        <td>{{$tuition->programs}}</td>
        <td>{{$tuition->at_the_time_of_admission}}</td>
        <td>{{$tuition->each_semester}}</td>
        <td>{{$tuition->fee}}</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
@endsection