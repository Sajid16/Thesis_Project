@extends('index') 
@section('stylesheet')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="/css/Alumni.css">
<title>Admission Info</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
 
@section('content')
<br>
<div class="container" style="margin-bottom:2%;">
    <div id="heading" align="center">
        <h1 class="heading display-8">Admission Information</h1>
    </div>
    <button type="button" class="btn btn-primary" style="margin-bottom:1%;">
        Undergraduate Programs <span class="badge badge-primary"></span>
      </button>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>News</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($AdmissionInfo1 as $AdmissionInfo1)
            <tr>
                <td>{{$AdmissionInfo1->Title}}</td>
                <td>
                    <a href="{{url('AdmissionPDF')}}/{{$AdmissionInfo1->id}}">view</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{--
<script>
    $('a[href*="pdf"]').click(function(e) {
            e.preventDefault(); // stop the existing link from firing
            var documentUrl = $(this).attr("href"); // get the url of the pdf
            window.open(documentUrl, '_blank'); // open the pdf in a new window/tab
          });
</script> --}}

<div class="container">
    <button type="button" class="btn btn-primary" style="margin-bottom:1%;">
              Master Programs <span class="badge badge-primary"></span>
            </button>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>News</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody id="myTable">

            @foreach ($AdmissionInfo2 as $AdmissionInfo2)
            <tr>
                <td>{{$AdmissionInfo2->Title}}</td>
                <td>
                    <a href="{{url('AdmissionPDF')}}/{{$AdmissionInfo2->id}}">view</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection