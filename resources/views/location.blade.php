<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Locations</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Location Selection">
    <meta name="keywords" content="An, effective, SEO description, of, the, page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/styles.css")}}>
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <link rel="stylesheet" href={{asset("css/media.css")}}>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>
    <script type="javascript" src="js/alterClass.js"></script>
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
        <h1 class="col w12 ">{{$locations[0]->map_name." - ".$locations[0]->nade_name}}</h1>
        <div class = "col w6 header-div">
            <div class="dropdown">
                <i class="fas fa-bars dropdownButton"></i>
                <div class="dropdownContent">
                    <a href="/">Home</a>
                    <a href="/{{$locations[0]->url}}">Smokes</a>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div id="page" class="w24">
        <div class="locationImgHolder">
            <img id="locationMap" class="displayImage" src={{asset("images/locationImages/mirageImages/mirageMap.jpg")}}>
        @foreach($locations as $location)
                <img id="locationImage-{{$location->location_id}}" class="displayImage locationImage" src={{asset("images/locationImages/mirageImages/".$location->location_image_ref)}}>
        @endforeach
        </div>
        <div class="locationHolder">
        @foreach($locations as $location)
            <a href = "/{{$locations[0]->url}}/{{$locations[0]->nade_url}}/{{$location->location_url}}"><div id="image-{{$location->location_id}}" class="h3 w4 locationText">| {{$location->location_name}} |</div></a>
        @endforeach
        </div>
    </div>
</main>
</body>
<script>
    $(".locationText").hover(function(){
        var imageId = this.id.substring(6);
        $(".displayImage").hide();
        $("#locationImage-" + imageId).show();
    });
</script>
