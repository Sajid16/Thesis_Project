<!DOCTYPE HTML>
<html>
<head>
    <title>Life at AUST</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/aust-life.css')}}" />
</head>
<body>


<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h1>Life At AUST<br />
            <a href=""></a></h1>
    </div>
</section>
<?php $iteration = 1; ?>
@foreach($stories as $story)

<article id="one" class="post style1 @if($iteration%2 == 0) invert alt @endif">
    <div class="image" style="height: 40rem">
        <img style="display: block; width: 100%; height: 100%;" src=" ..\images\{{$story->image}}" alt="" data-position="75% center" />
    </div>
    <div class="content" style="width: 55rem">
        <div class="inner">
            <header style="margin-top: -25%;">
                <h2><a href="generic.html">{{$story->title}}</a></h2>
                <p class="info" style="text-align: right;">{{$story->name}}</p>
            </header>
            <p style="text-align: justify;">{{$story->story}}</p>
        </div>
    </div>
</article>
    <?php $iteration++; ?>
@endforeach



<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
