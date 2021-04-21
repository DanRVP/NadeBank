<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Videos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Video Selection">
    <meta name="keywords" content="An, effective, SEO description, of, the, page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/styles.css")}}>
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <link rel="stylesheet" href={{asset("css/media.css")}}>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script>
        $(document).ready(function(){
            // DOM is Ready


        }); // DOC Ready
    </script>
</head>

<body>
<main>
    <header>
        <div class="col w24">
        <div class ="col w6 header-div">
            <a href="/"><i class="fas fa-home social-media"></i></a>
            <a href="https://www.youtube.com/channel/UC6J5Yz5ppMNo-I3mUyCExRQ" target="_blank"><i class="fab fa-youtube social-media"></i></a>
            <a href=""><i class="fab fa-twitter social-media"></i></a>
        </div>
        <h1 class="col w12 ">{{$videos[0]->map_name}} - {{$videos[0]->nade_name}} - {{$videos[0]->location_name}}</h1>
        <div class = "col w6 header-div">
            <div class="dropdown">
                <i class="fas fa-bars dropdownButton"></i>
                <div class="dropdownContent">
                    <a href="/">Home</a>
                    <a href="/{{$videos[0]->url}}">Smokes</a>
                    <a href="/{{$videos[0]->url}}/{{$videos[0]->nade_url}}">Locations</a>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div id="page w24">
        <div class="videoHolder w23">
        @foreach($videos as $video)
                <div class="smallVideoHolder">
                    <h2>{{$video->video_name}}</h2>
                    <iframe width="560" height="315" src={{$video->embed_link}} title="YouTube"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
        @endforeach
        </div>
    </div>
</main>
</body>










