<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Add Video</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Video Adding">
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
        <h1 class="col w12 ">Add a Video</h1>
        <div class = "col w6 header-div">
            <div class="dropdown">
                {{--<i class="fas fa-bars dropdownButton"></i>--}}
            </div>
        </div>
        </div>
    </header>
    <div id="page w23">
        <form class="form" action="{{route('nadebank.store')}}" method="POST">
            @csrf
            <ul class="errorList">
            @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
            @endforeach
            </ul>
            <div class="formGroupHolder">
                <h2 class="formTitle">Video Name:</h2>
                <input type="text" name="video_name" class="formField @error('video_name') isInvalid @enderror" value="{{old('video_name')}}">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Video Description:</h2>
                <input type="text" name="video_description" class="formField">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Embed Link:</h2>
                <input type="text" name="embed_link" class="formField @error('embed_link') isInvalid @enderror" value="{{old('embed_link')}}">
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Situational Uses:</h2>
                <textarea type="text" name="situation" class="formField"></textarea>
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Enemy actions around the grenade:</h2>
                <textarea type="text" name="enemy_actions" class="formField"></textarea>
            </div>
            <div class="formGroupHolder">
                <h2 class="formTitle">Location:</h2>
                <select type="text" name="location_id" class="formField @error('location_id') isInvalid @enderror" value="{{old('location_id')}}">
                    <option value=""></option>
                @foreach($locations as $location)
                        <option value="{{$location->location_id}}">{{$location->map_name}} - {{$location->location_name}}</option>
                    @endforeach
                </select>
            </div>
            <div id="buttonHolder">
                <button type="submit" id="submitButton">Submit</button>
            </div>
        </form>
    </div>
</main>
</body>


