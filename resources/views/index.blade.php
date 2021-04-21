<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Home Page">
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
            <a href="https://www.youtube.com/channel/UC6J5Yz5ppMNo-I3mUyCExRQ" target="_blank"><i class="fab fa-youtube social-media"></i></a>
            <a href=""><i class="fab fa-twitter social-media"></i></a>
        </div>
        <h1 class="col w12 ">NadeBank</h1>
        <div class = "col w6 header-div">
            {{--<i class="fas fa-bars dropdown"></i>--}}
        </div>
        </div>
    </header>
    <div id="page">
    @foreach($maps as $map)
            <a href="/{{$map->url}}">
                <div class="imageHolder w9">
                    <img class="homePageImage" src = {{asset("images/mapImages/".$map->image_ref)}}>
                    <h1 class="imageText">{{$map->map_name}}</h1>
                </div>
            </a>
        @endforeach
    </div>
</main>
</body>









